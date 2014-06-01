<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\IssueBundle\EventListener;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;

class IssueMenuListener
{
    /**
     * @param BuildMenuEvent $event
     */
    public function onMenuIssue(BuildMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'Issue tracker',
            array(
                'route' => 'jumph_issue_overview',
                'extras' => array(
                    'icon' => 'fa-bug fa-fw',
                    'weight' => 40
                )
            )
        );
    }
}
