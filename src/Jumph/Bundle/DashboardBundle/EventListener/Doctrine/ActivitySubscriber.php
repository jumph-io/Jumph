<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\DashboardBundle\EventListener\Doctrine;

use Doctrine\Common\EventArgs;
use Doctrine\Common\EventSubscriber;
use Jumph\Bundle\DashboardBundle\Entity\ActivityStream;
use Jumph\Bundle\UserBundle\Entity\User;

class ActivitySubscriber implements EventSubscriber
{

    /**
     * User object
     *
     * @var User
     */
    private $user;

    /**
     * Array of objects without a primary key
     *
     * @var array
     */
    protected $pendingInserts = array();

    /**
     * {@inheritdoc}
     */
    public function getSubscribedEvents()
    {
        return array(
            'onFlush',
            'postPersist'
        );
    }

    /**
     * Set the current user
     *
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * Checks for inserted object to update its logEntry
     * foreign key
     *
     * @param EventArgs $eventArgs
     *
     * @return void
     */
    public function postPersist(EventArgs $eventArgs)
    {
        $object = $eventArgs->getObject();
        $em = $eventArgs->getEntityManager();
        $oid = spl_object_hash($object);
        $uow = $em->getUnitOfWork();
        if ($this->pendingInserts && array_key_exists($oid, $this->pendingInserts)) {
            $activityStream = $this->pendingInserts[$oid];
            $logEntryMeta = $em->getClassMetadata(get_class($activityStream));
            $id = $object->getId();
            $logEntryMeta->getReflectionProperty('objectId')->setValue($activityStream, $id);
            $uow->scheduleExtraUpdate($activityStream, array(
                    'objectId' => array(null, $id)
                ));
            unset($this->pendingInserts[$oid]);
        }
    }

    /**
     * @param EventArgs $eventArgs
     *
     * @return void
     */
    public function onFlush(EventArgs $eventArgs)
    {
        $em = $eventArgs->getEntityManager();
        $uow = $em->getUnitOfWork();

        foreach ($uow->getScheduledEntityInsertions() as $entity) {
            $this->createActivity($eventArgs, "create", $entity);
        }
        foreach ($uow->getScheduledEntityUpdates() as $entity) {
            $this->createActivity($eventArgs, "update", $entity);
        }
        foreach ($uow->getScheduledEntityDeletions() as $entity) {
            $this->createActivity($eventArgs, "remove", $entity);
        }
    }

    /**
     * Create a new activity
     *
     * @param EventArgs $eventArgs
     * @param string    $verb
     * @param object    $entity
     *
     * @return ActivityStream
     */
    public function createActivity(EventArgs $eventArgs, $verb, $entity)
    {
        $em = $eventArgs->getEntityManager();
        $entityClass = \Doctrine\Common\Util\ClassUtils::getClass($entity);

        $classMetaData = $em->getClassMetadata($entityClass);
        if (!$classMetaData->reflClass->implementsInterface('Jumph\Bundle\DashboardBundle\Entity\ActivityInterface')) {
            return '';
        }

        $activityStreamMeta = $em->getClassMetadata("JumphDashboardBundle:ActivityStream");
        $uow = $em->getUnitOfWork();

        $activityStream = new ActivityStream();
        $activityStream->setVerb($verb);
        $activityStream->setObjectType($entityClass);
        $activityStream->setUser($this->user);

        if ($verb === 'create') {
            $this->pendingInserts[spl_object_hash($entity)] = $activityStream;
        } else {
            $activityStream->setObjectId($entity->getId());
        }


        $em->persist($activityStream);
        $uow->computeChangeSet($activityStreamMeta, $activityStream);

        return $activityStream;
    }
}
