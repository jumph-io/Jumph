<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\Tests\Entity;

use Jumph\Bundle\ClientBundle\Entity\Company;
use Jumph\Bundle\ClientBundle\Entity\Employee;
use Jumph\Bundle\ProjectBundle\Entity\Project;

class EmployeeTest extends \PHPUnit_Framework_TestCase
{

    public function testGetId()
    {
        $employee = new Employee();
        $this->assertNull($employee->getId());
    }

    public function testSetEmail()
    {
        $employee = new Employee();

        $employee->setEmail('peter@peternijssen.nl');
        $this->assertEquals('peter@peternijssen.nl', $employee->getEmail());
    }

    public function testSetFirstname()
    {
        $employee = new Employee();

        $employee->setFirstname('Peter');
        $this->assertEquals('Peter', $employee->getFirstname());
    }

    public function testSetLastname()
    {
        $employee = new Employee();

        $employee->setLastname('Nijssen');
        $this->assertEquals('Nijssen', $employee->getLastname());
    }

    public function testGetName()
    {
        $employee = new Employee();
        $employee->setFirstname('Peter');
        $employee->setLastname('Nijssen');
        $this->assertEquals('Peter Nijssen', $employee->getName());
    }

    public function testSetCompany()
    {
        $company = new Company();
        $employee = new Employee();

        $this->assertNull($employee->getCompany());
        $employee->setCompany($company);
        $this->assertEquals($company, $employee->getCompany());
    }

    public function testAddProject()
    {
        $employee = new Employee();
        $project = new Project();

        $this->assertCount(0, $employee->getProjects());
        $employee->addProject($project);
        $this->assertCount(1, $employee->getProjects());
        $employee->addProject($project);
        $this->assertCount(2, $employee->getProjects());
    }

    public function testRemoveProject()
    {
        $employee = new Employee();
        $project = new Project();

        $this->assertCount(0, $employee->getProjects());
        $employee->addProject($project);
        $this->assertCount(1, $employee->getProjects());
        $employee->removeProject($project);
        $this->assertCount(0, $employee->getProjects());
    }

    public function testGetCreatedAt()
    {
        $employee = new Employee();
        $this->assertNull($employee->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        $employee = new Employee();
        $this->assertNull($employee->getUpdatedAt());
    }

    public function testSetDeletedAt()
    {
        $employee = new Employee();
        $dateTime = new \DateTime();

        $employee->setDeletedAt($dateTime);
        $this->assertEquals($dateTime, $employee->getDeletedAt());
    }
}
