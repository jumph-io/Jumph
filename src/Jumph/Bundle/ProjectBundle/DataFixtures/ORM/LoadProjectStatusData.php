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
use Jumph\Bundle\ProjectBundle\Entity\ProjectStatus;

/**
 * Fixture for project status data
 */
class LoadProjectStatusData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $projectStatus = new ProjectStatus();
            $projectStatus->setName($faker->sentence(6));
            $projectStatus->setDescription($faker->paragraph(2));

            $this->addReference('project-status-'.$i, $projectStatus);
            $manager->persist($projectStatus);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 23;
    }
}
