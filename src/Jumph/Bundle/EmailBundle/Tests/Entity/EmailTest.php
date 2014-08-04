<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle\Tests\Entity;


use Jumph\Bundle\ClientBundle\Entity\Company;
use Jumph\Bundle\ClientBundle\Entity\Employee;
use Jumph\Bundle\EmailBundle\Entity\Email;
use Jumph\Bundle\ProjectBundle\Entity\Project;

class EmailTest extends \PHPUnit_Framework_TestCase
{

    public function testGetId()
    {
        $project = new Email();
        $this->assertNull($project->getId());
    }

    public function testSetName()
    {
        $email = new Email();

        $email->setSubject('Google Glass');
        $this->assertEquals('Google Glass', $email->getSubject());
    }

    public function testSetDescription()
    {
        $email = new Email();

        $email->setBody('A wearable android glass');
        $this->assertEquals('A wearable android glass', $email->getBody());
    }

    public function testSetCompany()
    {
        $company = new Company();
        $email = new Email();

        $this->assertNull($email->getCompany());
        $email->setCompany($company);
        $this->assertEquals($company, $email->getCompany());
    }

    public function testSetEmployee()
    {
        $employee = new Employee();
        $email = new Email();

        $this->assertNull($email->getEmployee());
        $email->setEmployee($employee);
        $this->assertEquals($employee, $email->getEmployee());
    }

    public function testSetProject()
    {
        $project = new Project();
        $email = new Email();

        $this->assertNull($email->getProject());
        $email->setProject($project);
        $this->assertEquals($project, $email->getProject());
    }

    public function testGetCreatedAt()
    {
        $email = new Email();
        $this->assertNull($email->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        $email = new Email();
        $this->assertNull($email->getUpdatedAt());
    }

    public function testSetDeletedAt()
    {
        $email = new Email();
        $dateTime = new \DateTime();

        $email->setDeletedAt($dateTime);
        $this->assertEquals($dateTime, $email->getDeletedAt());
    }
}
