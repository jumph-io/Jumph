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
use Jumph\Bundle\UserBundle\Entity\Company;

class CompanyRepository
{

    /**
     * Entity alias
     *
     * @var constant
     */
    const ENTITY_ALIAS = 'r';

    /**
     * Entity to use
     *
     * @var constant
     */
    const ENTITY_CLASS = 'JumphUserBundle:Company';

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
     * Find company by id
     *
     * @param int $id Company id
     *
     * @return array Array of companies
     */
    public function findById($id)
    {
        return $this->entityManager
            ->getRepository(self::ENTITY_CLASS)
            ->find($id);
    }

    /**
     * Find all companies
     *
     * @param string $sortField Field to sort by
     * @param string $sortOrder Order of sorting
     *
     * @return array Array of companies
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
     * Create a company
     *
     * @param Company $company
     */
    public function create(Company $company)
    {
        $this->entityManager->persist($company);
        $this->entityManager->flush();
    }

    /**
     * Update a company
     *
     * @param Company $company
     */
    public function update(Company $company)
    {
        $this->entityManager->persist($company);
        $this->entityManager->flush();
    }

    /**
     * Delete a company
     *
     * @param Company $company
     */
    public function delete(Company $company)
    {
        $this->entityManager->remove($company);
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
