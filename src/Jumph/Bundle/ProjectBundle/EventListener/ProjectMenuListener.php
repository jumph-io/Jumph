<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\EventListener;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;

class ProjectMenuListener
{
    /**
     * @param ConfigureMenuEvent $event
     */
    public function onMenuProject(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Projects',
            array(
                'route' => 'jumph_project_overview',
                'extras' => array(
                    'icon' => 'fa-tasks fa-fw',
                    'weight' => 20
                )
            )
        );
    }
}
