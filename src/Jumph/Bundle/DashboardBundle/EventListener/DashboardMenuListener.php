<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\DashboardBundle\EventListener;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;

class DashboardMenuListener
{
    /**
     * @param BuildMenuEvent $event
     */
    public function onMenuDashboard(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Dashboard',
            array(
                'route' => 'jumph_dashboard_overview',
                'extras' => array(
                    'icon' => 'fa-dashboard fa-fw',
                    'weight' => 0
                )
            )
        );
    }
}
