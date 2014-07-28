<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\EmailBundle\Entity\Email;
use Jumph\Bundle\ProjectBundle\Entity\Project;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAware;

class EmailManager extends PaginatorAware
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
    const ENTITY_CLASS = 'JumphEmailBundle:Email';

    /**
     * Object manager
     *
     * @var EntityManager
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
     * Find email by id
     *
     * @param int $id email id
     *
     * @return array Array of email
     */
    public function findById($id)
    {
        return $this->objectManager
            ->getRepository(self::ENTITY_CLASS)
            ->find($id);
    }

    /**
     * Find all emails
     *
     * @param string $sortField Field to sort by
     * @param string $sortOrder Order of sorting
     *
     * @return array Array of emails
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
     * Create a email
     *
     * @param Email $email
     */
    public function create(Email $email)
    {
        $this->objectManager->persist($email);
        $this->objectManager->flush();
    }

    /**
     * Update a email
     *
     * @param Email $email
     */
    public function update(Email $email)
    {
        $this->objectManager->persist($email);
        $this->objectManager->flush();
    }

    /**
     * Delete a email
     *
     * @param Email $email
     */
    public function delete(Email $email)
    {
        $this->objectManager->remove($email);
        $this->objectManager->flush();
    }
}
