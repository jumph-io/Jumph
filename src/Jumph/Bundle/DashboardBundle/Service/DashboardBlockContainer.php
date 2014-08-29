<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\DashboardBundle\Service;

use Jumph\Bundle\DashboardBundle\Entity\DashboardBlockInterface;

class DashboardBlockContainer
{
    /**
     * @var array
     */
    private $blocks;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blocks = array();
    }

    /**
     * Add a new block
     *
     * @param DashboardBlockInterface $block
     */
    public function addBlock(DashboardBlockInterface $block)
    {
        $this->blocks[] = $block;
    }

    /**
     * Return all blocks
     *
     * @return array
     */
    public function getAllBlocks()
    {
        return $this->blocks;
    }
}
