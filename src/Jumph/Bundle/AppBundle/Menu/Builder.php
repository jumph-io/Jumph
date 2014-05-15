<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\AppBundle\Menu;

use Jumph\Bundle\AppBundle\Event\BuildMenuEvent;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{

    /**
     * Create the side menu
     *
     * @param  FactoryInterface  $factory Menu Factory
     * @param  array             $options Options
     *
     * @return MenuItem
     */
    public function sideMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');

        $this->container->get('event_dispatcher')->dispatch(
            BuildMenuEvent::BUILDMENU,
            new BuildMenuEvent($factory, $menu)
        );

        $menu = $this->reorderMenu($menu);
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        return $menu;
    }

    /**
     * Sort the menu based on weight
     *
     * @param $menuItemA
     * @param $menuItemB
     *
     * @return int
     */
    public static function menuSort($menuItemA, $menuItemB)
    {
        if ($menuItemA->getExtra('weight') == $menuItemB->getExtra('weight')) {
            return 0;
        }
        return ($menuItemA->getExtra('weight') < $menuItemB->getExtra('weight')) ? -1 : 1;
    }

    /**
     * Reorder the menu
     *
     * @param $menu
     *
     * @return MenuItem
     */
    private function reorderMenu($menu)
    {
        $menuItems = $menu->getChildren();
        usort($menuItems, array($this, 'menuSort'));

        $newMenuOrder = array();
        foreach ($menuItems as $menuItem) {
            $newMenuOrder[] = $menuItem->getName();
        }

        $menu->reorderChildren($newMenuOrder);

        return $menu;
    }
}
