<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\TimeBundle\EventListener;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;

class TimeMenuListener
{
    /**
     * @param ConfigureMenuEvent $event
     */
    public function onMenuTime(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Time tracker',
            array(
                'route' => 'jumph_time_overview',
                'extras' => array(
                    'icon' => 'fa-clock-o fa-fw',
                    'weight' => 50
                )
            )
        );
    }
}
