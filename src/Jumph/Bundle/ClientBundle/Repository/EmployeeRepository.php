<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\Repository;

use Doctrine\ORM\EntityManager;
use Jumph\Bundle\ClientBundle\Entity\Company;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAware;
use Jumph\Bundle\ClientBundle\Entity\Employee;

class EmployeeRepository extends PaginatorAware
{

    /**
     * Entity alias
     *
     * @var constant
     */
    const ENTITY_ALIAS = 'e';

    /**
     * Entity to use
     *
     * @var constant
     */
    const ENTITY_CLASS = 'JumphClientBundle:Employee';

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
     * Find employee by id
     *
     * @param int $id employee id
     *
     * @return array Array of employees
     */
    public function findById($id)
    {
        return $this->entityManager
            ->getRepository(self::ENTITY_CLASS)
            ->find($id);
    }

    /**
     * Find all employees
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
    public function getPaginatedResults(Company $company, $page = 1, $limit = 15, array $sortby = array())
    {
        $qb = $this->entityManager
            ->createQueryBuilder(self::ENTITY_ALIAS)
            ->select(self::ENTITY_ALIAS)
            ->from(self::ENTITY_CLASS, self::ENTITY_ALIAS)
            ->where(self::ENTITY_ALIAS . '.company = :company_id')
            ->setParameter('company_id', $company->getId());

        return $this->getPaginator()->paginate($qb, $page, $limit, $sortby);
    }

    /**
     * Create a employee
     *
     * @param Employee $employee
     */
    public function create(Employee $employee)
    {
        $this->entityManager->persist($employee);
        $this->entityManager->flush();
    }

    /**
     * Update a employee
     *
     * @param Employee $employee
     */
    public function update(Employee $employee)
    {
        $this->entityManager->persist($employee);
        $this->entityManager->flush();
    }

    /**
     * Delete a employee
     *
     * @param Employee $employee
     */
    public function delete(Employee $employee)
    {
        $this->entityManager->remove($employee);
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
