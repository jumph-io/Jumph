<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\InstallerBundle\Menu;

use Knp\Menu\FactoryInterface;
use \Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{

    /**
     * Create the side menu
     *
     * @param  FactoryInterface  $factory Menu Factory
     *
     * @return ItemInterface
     */
    public function sideMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');

        $menu->addChild(
            'Check',
            array(
                'route' => 'jumph_install_check',
                'extras' => array(
                    'icon' => 'fa-check fa-fw'
                )
            )
        );

        $menu->addChild(
            'Database',
            array(
                'route' => 'jumph_install_database',
                'extras' => array(
                    'icon' => 'fa-database fa-fw',
                    'weight' => 20
                )
            )
        );

        $menu->addChild(
            'User',
            array(
                'route' => 'jumph_install_user',
                'extras' => array(
                    'icon' => 'fa-user fa-fw',
                    'weight' => 20
                )
            )
        );
        return $menu;
    }
}
