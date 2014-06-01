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
        $employee->setEmail('larry@jumph.io');
        $employee->setFirstname('Larry');
        $employee->setLastname('Page');
        $employee->setCompany($this->getReference('google'));

        $manager->persist($employee);
        $manager->flush();

        // Second employee
        $employee = new Employee();
        $employee->setEmail('sergey@jumph.io');
        $employee->setFirstname('Sergey');
        $employee->setLastname('Brin');
        $employee->setCompany($this->getReference('google'));

        $manager->persist($employee);
        $manager->flush();

        // Third employee
        $employee = new Employee();
        $employee->setEmail('bill@jumph.io');
        $employee->setFirstname('Bill');
        $employee->setLastname('Gates');
        $employee->setCompany($this->getReference('microsoft'));

        $manager->persist($employee);
        $manager->flush();

        // Fourth employee
        $employee = new Employee();
        $employee->setEmail('vic@jumph.io');
        $employee->setFirstname('Vic');
        $employee->setLastname('Gundotra');
        $employee->setCompany($this->getReference('google'));
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
