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
use Doctrine\ORM\QueryBuilder;
use Jumph\Bundle\AppBundle\Entity\FilterableManagerInterface;
use Jumph\Bundle\ClientBundle\Entity\Employee;

class EmployeeManager implements FilterableManagerInterface
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
