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
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\ClientBundle\Entity\Employee;

class LoadEmployeeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // First employee
        $employee = new Employee();
        $employee->setEmail('employee1@jumph.io');
        $employee->setFirstname('Employee');
        $employee->setLastname('One');
        $employee->setCompany($this->getReference('company-1'));

        $manager->persist($employee);
        $manager->flush();

        // Second employee
        $employee = new Employee();
        $employee->setEmail('employee2@jumph.io');
        $employee->setFirstname('Employee');
        $employee->setLastname('Two');
        $employee->setCompany($this->getReference('company-1'));

        $manager->persist($employee);
        $manager->flush();

        // Third employee
        $employee = new Employee();
        $employee->setEmail('employee3@jumph.io');
        $employee->setFirstname('Employee');
        $employee->setLastname('Three');
        $employee->setCompany($this->getReference('company-2'));

        $manager->persist($employee);
        $manager->flush();

        // Fourth employee
        $employee = new Employee();
        $employee->setEmail('employee4@jumph.io');
        $employee->setFirstname('Employee');
        $employee->setLastname('Four');
        $employee->setCompany($this->getReference('company-1'));
        $employee->setDeletedAt(new \DateTime());

        $manager->persist($employee);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
