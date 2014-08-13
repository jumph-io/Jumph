<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\QueryBuilder;
use Jumph\Bundle\AppBundle\Entity\FilterableManagerInterface;
use Jumph\Bundle\ProjectBundle\Entity\ProjectStatus;

class ProjectStatusManager implements FilterableManagerInterface
{

    /**
     * Entity alias
     *
     * @var constant
     */
    const ENTITY_ALIAS = 'ps';

    /**
     * Entity to use
     *
     * @var constant
     */
    const ENTITY_CLASS = 'JumphProjectBundle:ProjectStatus';

    /**
     * Object manager
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
     * Create a project status
     *
     * @param ProjectStatus $projectStatus
     */
    public function create(ProjectStatus $projectStatus)
    {
        $this->objectManager->persist($projectStatus);
        $this->objectManager->flush();
    }

    /**
     * Update a project status
     *
     * @param ProjectStatus $projectStatus
     */
    public function update(ProjectStatus $projectStatus)
    {
        $this->objectManager->persist($projectStatus);
        $this->objectManager->flush();
    }

    /**
     * Delete a project status
     *
     * @param ProjectStatus $projectStatus
     */
    public function delete(ProjectStatus $projectStatus)
    {
        $this->objectManager->remove($projectStatus);
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
