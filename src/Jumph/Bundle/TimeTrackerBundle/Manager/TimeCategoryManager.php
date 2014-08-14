<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\TimeTrackerBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\AppBundle\Entity\FilterableManagerInterface;
use Jumph\Bundle\TimeTrackerBundle\Entity\TimeCategory;

class TimeCategoryManager implements FilterableManagerInterface
{

    /**
     * Entity alias
     *
     * @var constant
     */
    const ENTITY_ALIAS = 'tc';

    /**
     * Entity to use
     *
     * @var constant
     */
    const ENTITY_CLASS = 'JumphTimeTrackerBundle:TimeCategory';

    /**
     * Object manager
     *
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * Constructor.
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Create a time category
     *
     * @param TimeCategory $timeCategory
     */
    public function create(TimeCategory $timeCategory)
    {
        $this->objectManager->persist($timeCategory);
        $this->objectManager->flush();
    }

    /**
     * Update a time category
     *
     * @param TimeCategory $timeCategory
     */
    public function update(TimeCategory $timeCategory)
    {
        $this->objectManager->persist($timeCategory);
        $this->objectManager->flush();
    }

    /**
     * Delete a time category
     *
     * @param TimeCategory $timeCategory
     */
    public function delete(TimeCategory $timeCategory)
    {
        $this->objectManager->remove($timeCategory);
        $this->objectManager->flush();
    }

    /**
     * Return a new query builder
     *
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->objectManager
            ->getRepository(self::ENTITY_CLASS)
            ->createQueryBuilder(self::ENTITY_ALIAS);
    }
}
