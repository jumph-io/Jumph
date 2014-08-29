<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\DashboardBundle\Entity;

interface DashboardBlockInterface
{
    /**
     * @return string
     */
    public function getColor();

    /**
     * @return string
     */
    public function getIcon();

    /**
     * @return string
     */
    public function getItemName();

    /**
     * @return string
     */
    public function getLink();

    /**
     * @return int
     */
    public function getTotalItems();
}
