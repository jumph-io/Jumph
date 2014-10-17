<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Jumph\Bundle\ProjectBundle\Entity\Project;

/**
 * Fixture for project data
 */
class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->setName($faker->sentence(6));
            $project->setDescription($faker->paragraph(2));
            $project->setCompany($this->getReference('company-' . $faker->numberBetween(0, 9)));
            $project->setEmployee($this->getReference('employee-' . $faker->numberBetween(0, 9)));
            $project->setStatus($this->getReference('project-status-' . $i));

            $this->addReference('project-'.$i, $project);
            $manager->persist($project);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 24;
    }
}
