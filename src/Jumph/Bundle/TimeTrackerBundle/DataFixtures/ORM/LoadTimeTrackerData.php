<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\TimeTrackerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Jumph\Bundle\TimeTrackerBundle\Entity\TimeTracker;

/**
 * Fixture for time tracker data
 */
class LoadTimeTrackerData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $timeTracker = new TimeTracker();
            $timeTracker->setCategory($this->getReference('time-category-' . $faker->numberBetween(0, 9)));
            $timeTracker->setProject($this->getReference('project-' . $faker->numberBetween(0, 9)));
            $timeTracker->setDateAt($faker->dateTime);
            $timeTracker->setDescription($faker->paragraph(2));
            $timeTracker->setHours($faker->randomFloat(1, 0, 10));

            $manager->persist($timeTracker);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 34;
    }
}
