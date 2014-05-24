<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\Repository;

use Doctrine\ORM\EntityManager;
use Jumph\Bundle\ProjectBundle\Entity\Project;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAware;

class ProjectRepository extends PaginatorAware
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
     * Entity manager
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
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
        return $this->entityManager
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
        return $this->entityManager
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
     * @return \Knp\Component\Pager\Pagination\PaginationInterface Returns a filtered paginator
     */
    public function getPaginatedResults($page = 1, $limit = 15, array $sortby = array())
    {
        $qb = $this->entityManager
            ->createQueryBuilder(self::ENTITY_ALIAS)
            ->select(self::ENTITY_ALIAS)
            ->from(self::ENTITY_CLASS, self::ENTITY_ALIAS);

        return $this->getPaginator()->paginate($qb, $page, $limit, $sortby);
    }

    /**
     * Create a project
     *
     * @param Project $project
     */
    public function create(Project $project)
    {
        $this->entityManager->persist($project);
        $this->entityManager->flush();
    }

    /**
     * Update a project
     *
     * @param Project $project
     */
    public function update(Project $project)
    {
        $this->entityManager->persist($project);
        $this->entityManager->flush();
    }

    /**
     * Delete a project
     *
     * @param Project $project
     */
    public function delete(Project $project)
    {
        $this->entityManager->remove($project);
        $this->entityManager->flush();
    }

    /**
     * Return a new query builder
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->entityManager
            ->getRepository(self::ENTITY_CLASS)
            ->createQueryBuilder(self::ENTITY_ALIAS);
    }
}
