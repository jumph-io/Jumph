<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Jumph\Bundle\ClientBundle\Entity\Employee;

/**
 * Fixture for employee data
 */
class LoadEmployeeData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $employee = new Employee();
            $employee->setFirstname($faker->firstName);
            $employee->setLastname($faker->lastName);
            $employee->setEmail($faker->email);
            $employee->setCompany($this->getReference('company-' . $i));

            $this->addReference('employee-'.$i, $employee);
            $manager->persist($employee);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 14;
    }
}
