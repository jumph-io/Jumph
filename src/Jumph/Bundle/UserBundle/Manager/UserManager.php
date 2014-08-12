<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\UserBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\QueryBuilder;
use Jumph\Bundle\AppBundle\Entity\FilterableManagerInterface;
use Jumph\Bundle\UserBundle\Entity\User;

class UserManager implements FilterableManagerInterface
{
    /**
     * Entity alias
     *
     * @var constant
     */
    const ENTITY_ALIAS = 'u';

    /**
     * Entity to use
     *
     * @var constant
     */
    const ENTITY_CLASS = 'JumphUserBundle:User';

    /**
     * Entity manager
     *
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * Constructor.
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Create an user
     *
     * @param User $user
     */
    public function create(User $user)
    {
        $this->objectManager->persist($user);
        $this->objectManager->flush();
    }

    /**
     * Update an user
     *
     * @param User $user
     */
    public function update(User $user)
    {
        $this->objectManager->persist($user);
        $this->objectManager->flush();
    }

    /**
     * Delete an user
     *
     * @param User $user
     */
    public function delete(User $user)
    {
        $this->objectManager->remove($user);
        $this->objectManager->flush();
    }

    /**
     * Return a new query builder
     *
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->objectManager
            ->getRepository(self::ENTITY_CLASS)
            ->createQueryBuilder(self::ENTITY_ALIAS);
    }
}
