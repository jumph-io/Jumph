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
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAware;
use Jumph\Bundle\ClientBundle\Entity\Company;

class CompanyManager extends PaginatorAware
{

    /**
     * Entity alias
     *
     * @var constant
     */
    const ENTITY_ALIAS = 'c';

    /**
     * Entity to use
     *
     * @var constant
     */
    const ENTITY_CLASS = 'JumphClientBundle:Company';

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
     * Find company by id
     *
     * @param int $id Company id
     *
     * @return array Array of companies
     */
    public function findById($id)
    {
        return $this->objectManager
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
     * @return \Knp\Component\Pager\Pagination\PaginationInterface Returns a filtered paginator
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
     * Create a company
     *
     * @param Company $company
     */
    public function create(Company $company)
    {
        $this->objectManager->persist($company);
        $this->objectManager->flush();
    }

    /**
     * Update a company
     *
     * @param Company $company
     */
    public function update(Company $company)
    {
        $this->objectManager->persist($company);
        $this->objectManager->flush();
    }

    /**
     * Delete a company
     *
     * @param Company $company
     */
    public function delete(Company $company)
    {
        $this->objectManager->remove($company);
        $this->objectManager->flush();
    }
}
