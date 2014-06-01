<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\CalendarBundle\EventListener;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;

class CalendarMenuListener
{
    /**
     * @param BuildMenuEvent $event
     */
    public function onMenuCalendar(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Calendar',
            array(
                'route' => 'jumph_calendar_overview',
                'extras' => array(
                    'icon' => 'fa-calendar fa-fw',
                    'weight' => 80
                )
            )
        );
    }
}
