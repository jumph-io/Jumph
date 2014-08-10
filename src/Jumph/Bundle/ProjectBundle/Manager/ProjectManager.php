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
use Jumph\Bundle\ProjectBundle\Entity\Project;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAware;
use Knp\Component\Pager\Pagination\PaginationInterface;

class ProjectManager extends PaginatorAware
{

    /**
     * Entity alias
     *
     * @var constant
     */
    const ENTITY_ALIAS = 'p';

    /**
     * Entity to use
     *
     * @var constant
     */
    const ENTITY_CLASS = 'JumphProjectBundle:Project';

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
     * Find project by id
     *
     * @param int $id project id
     *
     * @return array Array of projects
     */
    public function findById($id)
    {
        return $this->objectManager
            ->getRepository(self::ENTITY_CLASS)
            ->find($id);
    }

    /**
     * Find all projects
     *
     * @param string $sortField Field to sort by
     * @param string $sortOrder Order of sorting
     *
     * @return array Array of projects
     */
    public function findAll($sortField = 'createdAt', $sortOrder = 'DESC')
    {
        return $this->objectManager
            ->createQueryBuilder(self::ENTITY_ALIAS)
            ->select(self::ENTITY_ALIAS)
            ->from(self::ENTITY_CLASS, self::ENTITY_ALIAS)
            ->orderBy(self::ENTITY_ALIAS . "." . $sortField, $sortOrder)
            ->getQuery()
            ->getResult();
    }

    /**
     * Get paginated results.
     *
     * @param int           $page       Current page
     * @param int           $limit      Items per page limit
     * @param array         $sortby     Sorting options
     *
     * @return PaginationInterface Returns a filtered paginator
     */
    public function getPaginatedResults($page = 1, $limit = 15, array $sortby = array())
    {
        $qb = $this->objectManager
            ->createQueryBuilder(self::ENTITY_ALIAS)
            ->select(self::ENTITY_ALIAS, "e", "c")
            ->from(self::ENTITY_CLASS, self::ENTITY_ALIAS)
            ->leftJoin(self::ENTITY_ALIAS.".employee", "e")
            ->leftJoin(self::ENTITY_ALIAS.".company", "c");

        return $this->getPaginator()->paginate($qb, $page, $limit, $sortby);
    }

    /**
     * Create a project
     *
     * @param Project $project
     */
    public function create(Project $project)
    {
        $this->objectManager->persist($project);
        $this->objectManager->flush();
    }

    /**
     * Update a project
     *
     * @param Project $project
     */
    public function update(Project $project)
    {
        $this->objectManager->persist($project);
        $this->objectManager->flush();
    }

    /**
     * Delete a project
     *
     * @param Project $project
     */
    public function delete(Project $project)
    {
        $this->objectManager->remove($project);
        $this->objectManager->flush();
    }
}
