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
     * @param BuildMenuEvent $event
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

    /**
     * @param BuildMenuEvent $event
     */
    public function onConfigMenuProject(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Project status',
            array(
                'route' => 'jumph_config_project_status_overview',
                'extras' => array(
                    'icon' => 'fa-cogs fa-fw',
                    'weight' => 10
                )
            )
        );
    }
}
