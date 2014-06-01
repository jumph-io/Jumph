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

class CompanyTest extends \PHPUnit_Framework_TestCase
{

    public function testGetId()
    {
        $company = new Company();
        $this->assertNull($company->getId());
    }

    public function testSetName()
    {
        $company = new Company();

        $company->setName('Google');
        $this->assertEquals('Google', $company->getName());
    }

    public function testAddEmployee()
    {
        $company = new Company();
        $employee = new Employee();

        $this->assertCount(0, $company->getEmployees());
        $company->addEmployee($employee);
        $this->assertCount(1, $company->getEmployees());
        $company->addEmployee($employee);
        $this->assertCount(2, $company->getEmployees());
    }

    public function testRemoveEmployee()
    {
        $company = new Company();
        $employee = new Employee();

        $this->assertCount(0, $company->getEmployees());
        $company->addEmployee($employee);
        $this->assertCount(1, $company->getEmployees());
        $company->removeEmployee($employee);
        $this->assertCount(0, $company->getEmployees());
    }

    public function testAddProject()
    {
        $company = new Company();
        $project = new Project();

        $this->assertCount(0, $company->getProjects());
        $company->addProject($project);
        $this->assertCount(1, $company->getProjects());
        $company->addProject($project);
        $this->assertCount(2, $company->getProjects());
    }

    public function testRemoveProject()
    {
        $company = new Company();
        $project = new Project();

        $this->assertCount(0, $company->getProjects());
        $company->addProject($project);
        $this->assertCount(1, $company->getProjects());
        $company->removeProject($project);
        $this->assertCount(0, $company->getProjects());
    }

    public function testGetCreatedAt()
    {
        $company = new Company();
        $this->assertNull($company->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        $company = new Company();
        $this->assertNull($company->getUpdatedAt());
    }

    public function testSetDeletedAt()
    {
        $company = new Company();
        $dateTime = new \DateTime();

        $company->setDeletedAt($dateTime);
        $this->assertEquals($dateTime, $company->getDeletedAt());
    }
}
