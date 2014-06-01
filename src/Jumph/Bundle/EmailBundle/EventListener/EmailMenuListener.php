<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle\EventListener;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;

class EmailMenuListener
{
    /**
     * @param BuildMenuEvent $event
     */
    public function onMenuEmail(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Emails',
            array(
                'route' => 'jumph_email_overview',
                'extras' => array(
                    'icon' => 'fa-envelope fa-fw',
                    'weight' => 60
                )
            )
        );
    }
}
