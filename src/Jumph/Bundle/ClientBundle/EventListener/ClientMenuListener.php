<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\EventListener;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;

class ClientMenuListener
{
    /**
     * @param ConfigureMenuEvent $event
     */
    public function onMenuClient(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Clients',
            array(
                'route' => 'jumph_company_overview',
                'extras' => array(
                    'icon' => 'fa-building fa-fw',
                    'weight' => 100
                )
            )
        );
    }
}
