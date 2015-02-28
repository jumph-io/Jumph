<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\Dashboard;

use Jumph\Bundle\DashboardBundle\Entity\DashboardBlockInterface;
use Jumph\Bundle\ProjectBundle\Manager\ProjectManager;

class ProjectBlock implements DashboardBlockInterface
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
     * @var ProjectManager
     */
    private $projectManager;

    /**
     * Constructor
     *
     * @param ProjectManager $projectManager
     */
    public function __construct(ProjectManager $projectManager)
    {
        $this->projectManager = $projectManager;
        $this->color = "aqua";
        $this->icon = "tasks";
        $this->itemName = "projects";
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
        return $this->projectManager->count();
    }
}
