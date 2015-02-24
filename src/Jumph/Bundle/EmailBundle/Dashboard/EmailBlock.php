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
use Jumph\Bundle\EmailBundle\Manager\EmailManager;

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
     * @var EmailManager
     */
    private $emailManager;

    /**
     * Constructor
     *
     * @param EmailManager $emailManager
     */
    public function __construct(EmailManager $emailManager)
    {
        $this->emailManager = $emailManager;
        $this->color = "green";
        $this->icon = "envelope";
        $this->itemName = "emails";
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
     * @return int
     */
    public function getTotalItems()
    {
        return $this->emailManager->count();
    }
}
