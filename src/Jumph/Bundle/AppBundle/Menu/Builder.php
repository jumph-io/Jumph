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
        $menu->setChildrenAttribute('class', 'nav');

        $this->container->get('event_dispatcher')->dispatch(
            BuildMenuEvent::BUILDMENU,
            new BuildMenuEvent($factory, $menu)
        );

        return $menu;
    }
}
