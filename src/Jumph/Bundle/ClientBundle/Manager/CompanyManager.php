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
use Jumph\Bundle\ClientBundle\Entity\Company;

class CompanyManager implements FilterableManagerInterface
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
