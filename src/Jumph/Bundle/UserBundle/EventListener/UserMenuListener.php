<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\UserBundle\EventListener;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;

class UserMenuListener
{
    /**
     * @param BuildMenuEvent $event
     */
    public function onMenuUser(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Users',
            array(
                'route' => 'jumph_user_overview',
                'extras' => array(
                    'icon' => 'fa-users fa-fw',
                    'weight' => 110
                )
            )
        );
    }
}
