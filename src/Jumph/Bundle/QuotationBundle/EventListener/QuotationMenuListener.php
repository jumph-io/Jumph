<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\QuotationBundle\EventListener;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;

class QuotationMenuListener
{
    /**
     * @param BuildMenuEvent $event
     */
    public function onMenuQuotation(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        /*$menu->addChild(
            'Quotations',
            array(
                'route' => 'jumph_quotation_overview',
                'extras' => array(
                    'icon' => 'fa-usd fa-fw',
                    'weight' => 30
                )
            )
        );*/
    }
}
