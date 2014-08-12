<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\Filter\Subscriber;

use Lexik\Bundle\FormFilterBundle\Event\ApplyFilterEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CompanyFilterSubscriber implements EventSubscriberInterface
{
    /**
     * Events to listen to.
     *
     * @return Array An array with events to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            // if a Doctrine\ORM\QueryBuilder is passed to the lexik_form_filter.query_builder_updater service
            'lexik_form_filter.apply.orm.company_filter_name' => array('filterName'),

            // if a Doctrine\DBAL\Query\QueryBuilder is passed to the lexik_form_filter.query_builder_updater service
            'lexik_form_filter.apply.dbal.company_filter_name' => array('filterName'),
        );
    }

    /**
     * A listener for the filter type filterName.
     *
     * @param ApplyFilterEvent $event A LexikFormFilter event
     */
    public function filterName(ApplyFilterEvent $event)
    {
        $qb     = $event->getQueryBuilder();
        $expr   = $event->getFilterQuery()->getExpr();
        $values = $event->getValues();

        if (!empty($values['value'])) {
            $qb->andWhere(
                $expr->orX()
                    ->add($expr->like('c.name', "'%".$values['value']."%'"))
            );
        }

    }
}
