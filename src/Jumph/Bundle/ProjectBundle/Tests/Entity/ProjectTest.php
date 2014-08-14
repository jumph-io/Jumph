<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\Tests\Entity;

use Jumph\Bundle\ClientBundle\Entity\Company;
use Jumph\Bundle\ClientBundle\Entity\Employee;
use Jumph\Bundle\ProjectBundle\Entity\Project;
use Jumph\Bundle\ProjectBundle\Entity\ProjectStatus;
use Jumph\Bundle\TimeTrackerBundle\Entity\TimeTracker;

class ProjectTest extends \PHPUnit_Framework_TestCase
{

    public function testGetId()
    {
        $project = new Project();
        $this->assertNull($project->getId());
    }

    public function testSetName()
    {
        $project = new Project();

        $project->setName('Google Glass');
        $this->assertEquals('Google Glass', $project->getName());
    }

    public function testSetStatus()
    {
        $project = new Project();
        $projectStatus = new ProjectStatus();

        $project->setStatus($projectStatus);
        $this->assertEquals($projectStatus, $project->getStatus());
    }

    public function testSetDescription()
    {
        $project = new Project();

        $project->setDescription('A wearable android glass');
        $this->assertEquals('A wearable android glass', $project->getDescription());
    }

    public function testSetCompany()
    {
        $company = new Company();
        $project = new Project();

        $this->assertNull($project->getCompany());
        $project->setCompany($company);
        $this->assertEquals($company, $project->getCompany());
    }

    public function testSetEmployee()
    {
        $employee = new Employee();
        $project = new Project();

        $this->assertNull($project->getEmployee());
        $project->setEmployee($employee);
        $this->assertEquals($employee, $project->getEmployee());
    }

    public function testAddTimeTracker()
    {
        $timeTracker = new TimeTracker();
        $project = new Project();

        $this->assertEquals(0, $project->getTimetrackers()->count());
        $project->addTimeTracker($timeTracker);
        $this->assertEquals(1, $project->getTimetrackers()->count());
    }

    public function testRemoveTimeTracker()
    {
        $timeTracker = new TimeTracker();
        $project = new Project();

        $this->assertEquals(0, $project->getTimetrackers()->count());
        $project->addTimeTracker($timeTracker);
        $this->assertEquals(1, $project->getTimetrackers()->count());
        $project->removeTimeTracker($timeTracker);
        $this->assertEquals(0, $project->getTimetrackers()->count());
    }

    public function testGetCreatedAt()
    {
        $project = new Project();
        $this->assertNull($project->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        $project = new Project();
        $this->assertNull($project->getUpdatedAt());
    }

    public function testSetDeletedAt()
    {
        $project = new Project();
        $dateTime = new \DateTime();

        $project->setDeletedAt($dateTime);
        $this->assertEquals($dateTime, $project->getDeletedAt());
    }
}
