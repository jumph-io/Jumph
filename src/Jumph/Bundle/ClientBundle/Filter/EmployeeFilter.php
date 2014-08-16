<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\Filter;

use Jumph\Bundle\AppBundle\Entity\FilterableManagerInterface;
use Jumph\Bundle\ClientBundle\Entity\Company;
use Jumph\Bundle\ClientBundle\Manager\EmployeeManager;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAware;
use Lexik\Bundle\FormFilterBundle\Filter\FilterBuilderUpdater;
use Lexik\Bundle\FormFilterBundle\Filter\FilterBuilderUpdaterInterface;
use Symfony\Component\Form\FormInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Doctrine\ORM\QueryBuilder;

class EmployeeFilter extends PaginatorAware
{
    /**
     * @var FilterableManagerInterface
     */
    private $manager;

    /**
     * @var FilterBuilderUpdater
     */
    private $filterBuilderUpdater;

    /**
     * Constructor.
     *
     * @param FilterableManagerInterface $manager Repository to filter
     * @param FilterBuilderUpdater $filterBuilderUpdater The form filter
     */
    public function __construct(
        FilterableManagerInterface $manager,
        FilterBuilderUpdaterInterface $filterBuilderUpdater
    ) {
        $this->manager = $manager;
        $this->filterBuilderUpdater = $filterBuilderUpdater;
    }

    /**
     * Returns a filtered paginator.
     *
     * @param Company $company
     * @param FormInterface $form Filter form
     * @param int $page Page number
     * @param int $limit Limit per page
     * @param array $options Pagination options
     *
     * @return PaginationInterface
     */
    public function getPaginatedResults(
        Company $company,
        FormInterface $form,
        $page = 1,
        $limit = 100,
        array $options = array()
    ) {
        $qb = $this->createQueryBuilder($form)
            ->where(EmployeeManager::ENTITY_ALIAS . '.company = :company_id')
            ->setParameter('company_id', $company->getId());

        return $this->getPaginator()->paginate($qb, $page, $limit, $options);
    }

    /**
     * Creates a filtered query builder.
     *
     * @param FormInterface $form Filter form
     *
     * @return QueryBuilder Returns the queryBuilder object to filter on
     */
    private function createQueryBuilder(FormInterface $form)
    {
        $qb = $this->manager->getQueryBuilder();

        if ($form->isValid()) {
            $this->filterBuilderUpdater->addFilterConditions($form, $qb);
        }

        return $qb;
    }
}
