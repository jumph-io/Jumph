<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\AppBundle\Entity;

use Doctrine\ORM\QueryBuilder;

interface FilterableManagerInterface
{
    /**
     * Return a new query builder
     *
     * @return QueryBuilder
     */
    public function getQueryBuilder();
}
