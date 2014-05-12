<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\UserBundle\Repository;

use Doctrine\ORM\EntityManager;
use Jumph\Bundle\UserBundle\Entity\User;

class UserRepository
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
     * Find user by id
     *
     * @param int $id User id
     *
     * @return array Array of users
     */
    public function findById($id)
    {
        return $this->entityManager
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
        return $this->entityManager
            ->createQueryBuilder(self::ENTITY_ALIAS)
            ->select(self::ENTITY_ALIAS)
            ->from(self::ENTITY_CLASS, self::ENTITY_ALIAS)
            ->orderBy(self::ENTITY_ALIAS . $sortField, $sortOrder)
            ->getQuery()
            ->getResult();
    }

    /**
     * Create an user
     *
     * @param User $user
     */
    public function create(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    /**
     * Update an user
     *
     * @param User $user
     */
    public function update(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    /**
     * Delete an user
     *
     * @param User $user
     */
    public function delete(User $user)
    {
        $this->entityManager->remove($user);
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
