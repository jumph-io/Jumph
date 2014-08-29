<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle\Dashboard;

use Jumph\Bundle\DashboardBundle\Entity\DashboardBlockInterface;

class EmailBlock implements DashboardBlockInterface
{
    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $icon;

    /**
     * @var string
     */
    private $itemName;

    /**
     * @var string
     */
    private $link;

    /**
     * @var integer
     */
    private $totalItems;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->color = "green";
        $this->icon = "envelope";
        $this->itemName = "emails";
        $this->link = "#";
        $this->totalItems = "8";
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return int
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }
}
