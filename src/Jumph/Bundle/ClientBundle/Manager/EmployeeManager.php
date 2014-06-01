<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\ClientBundle\Entity\Company;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAware;
use Jumph\Bundle\ClientBundle\Entity\Employee;

class EmployeeManager extends PaginatorAware
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
     * Find employee by id
     *
     * @param int $id employee id
     *
     * @return array Array of employees
     */
    public function findById($id)
    {
        return $this->objectManager
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
    public function getPaginatedResults(Company $company, $page = 1, $limit = 15, array $sortby = array())
    {
        $qb = $this->objectManager
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
        $this->objectManager->persist($employee);
        $this->objectManager->flush();
    }

    /**
     * Update a employee
     *
     * @param Employee $employee
     */
    public function update(Employee $employee)
    {
        $this->objectManager->persist($employee);
        $this->objectManager->flush();
    }

    /**
     * Delete a employee
     *
     * @param Employee $employee
     */
    public function delete(Employee $employee)
    {
        $this->objectManager->remove($employee);
        $this->objectManager->flush();
    }
}
