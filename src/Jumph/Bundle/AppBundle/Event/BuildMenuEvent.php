<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\AppBundle\Event;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\EventDispatcher\Event;

class BuildMenuEvent extends Event
{
    const BUILD_MENU = 'jumph.build_menu';

    const BUILD_CONFIG_MENU = 'jumph.build_config_menu';

    /**
     * @var ItemInterface
     */
    private $menu;

    /**
     * Constructor
     *
     * @param ItemInterface $menu
     */
    public function __construct(ItemInterface $menu)
    {
        $this->menu = $menu;
    }

    /**
     * @return ItemInterface
     */
    public function getMenu()
    {
        return $this->menu;
    }
}
