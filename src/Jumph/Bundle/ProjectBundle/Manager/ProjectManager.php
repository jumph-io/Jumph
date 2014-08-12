<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\QueryBuilder;
use Jumph\Bundle\AppBundle\Entity\FilterableManagerInterface;
use Jumph\Bundle\ProjectBundle\Entity\Project;

class ProjectManager implements FilterableManagerInterface
{

    /**
     * Entity alias
     *
     * @var constant
     */
    const ENTITY_ALIAS = 'p';

    /**
     * Entity to use
     *
     * @var constant
     */
    const ENTITY_CLASS = 'JumphProjectBundle:Project';

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
     * Create a project
     *
     * @param Project $project
     */
    public function create(Project $project)
    {
        $this->objectManager->persist($project);
        $this->objectManager->flush();
    }

    /**
     * Update a project
     *
     * @param Project $project
     */
    public function update(Project $project)
    {
        $this->objectManager->persist($project);
        $this->objectManager->flush();
    }

    /**
     * Delete a project
     *
     * @param Project $project
     */
    public function delete(Project $project)
    {
        $this->objectManager->remove($project);
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
