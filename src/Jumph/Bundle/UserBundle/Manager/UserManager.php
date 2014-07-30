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
use Doctrine\ORM\EntityManager;
use Jumph\Bundle\UserBundle\Entity\User;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAware;

class UserManager extends PaginatorAware
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
     * Find user by id
     *
     * @param int $id User id
     *
     * @return array Array of users
     */
    public function findById($id)
    {
        return $this->objectManager
            ->getRepository(self::ENTITY_ALIAS)
            ->find($id);
    }

    /**
     * Find all users
     *
     * @param string $sortField Field to sort by
     * @param string $sortOrder Order of sorting
     *
     * @return array Array of users
     */
    public function findAll($sortField = 'createdAt', $sortOrder = 'DESC')
    {
        return $this->objectManager
            ->createQueryBuilder(self::ENTITY_ALIAS)
            ->select(self::ENTITY_ALIAS)
            ->from(self::ENTITY_CLASS, self::ENTITY_ALIAS)
            ->orderBy(self::ENTITY_ALIAS . $sortField, $sortOrder)
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
            ->select(self::ENTITY_ALIAS)
            ->from(self::ENTITY_CLASS, self::ENTITY_ALIAS);

        return $this->getPaginator()->paginate($qb, $page, $limit, $sortby);
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
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->objectManager
            ->getRepository(self::ENTITY_CLASS)
            ->createQueryBuilder(self::ENTITY_ALIAS);
    }
}
