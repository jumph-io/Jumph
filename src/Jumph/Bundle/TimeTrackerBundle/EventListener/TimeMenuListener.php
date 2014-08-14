<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\TimeTrackerBundle\EventListener;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;

class TimeMenuListener
{
    /**
     * @param BuildMenuEvent $event
     */
    public function onMenuTime(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Time tracker',
            array(
                'route' => 'jumph_time_tracker_overview',
                'extras' => array(
                    'icon' => 'fa-clock-o fa-fw',
                    'weight' => 50
                )
            )
        );
    }

    /**
     * @param BuildMenuEvent $event
     */
    public function onConfigMenuTime(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Time tracker category',
            array(
                'route' => 'jumph_config_time_category_overview',
                'extras' => array(
                    'icon' => 'fa-cogs fa-fw',
                    'weight' => 40
                )
            )
        );
    }
}
