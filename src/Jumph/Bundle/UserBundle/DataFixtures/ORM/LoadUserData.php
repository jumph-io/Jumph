<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Jumph\Bundle\UserBundle\Entity\User;

/**
 * Fixture for for user data
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setLastLogin($faker->dateTime);
            $user->setEnabled(true);
            $user->setPlainPassword("jumphpassword");
            $user->setPassword("jumphpassword");
            $user->setEmail($faker->email);
            if ($i == 0) {
                $user->setUsername("jumph");
            } else {
                $user->setUsername($faker->userName);
            }

            $this->addReference('user-'.$i, $user);
            $manager->persist($user);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
}
