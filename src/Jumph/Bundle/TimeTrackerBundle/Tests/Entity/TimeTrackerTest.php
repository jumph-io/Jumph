<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\TimeTrackerBundle\Tests\Entity;

use Jumph\Bundle\ProjectBundle\Entity\Project;
use Jumph\Bundle\TimeTrackerBundle\Entity\TimeCategory;
use Jumph\Bundle\TimeTrackerBundle\Entity\TimeTracker;

class TimeTrackerTest extends \PHPUnit_Framework_TestCase
{

    public function testGetId()
    {
        $timeTracker = new TimeTracker();
        $this->assertNull($timeTracker->getId());
    }

    public function testSetCategory()
    {
        $timeTracker = new TimeTracker();
        $category = new TimeCategory();

        $timeTracker->setCategory($category);
        $this->assertEquals($category, $timeTracker->getCategory());
    }

    public function testSetDescription()
    {
        $timeTracker = new TimeTracker();

        $timeTracker->setDescription('Creating wireframes');
        $this->assertEquals('Creating wireframes', $timeTracker->getDescription());
    }


    public function testSetDateAt()
    {
        $timeTracker = new TimeTracker();
        $dateTime = new \DateTime();

        $timeTracker->setDateAt($dateTime);
        $this->assertEquals($dateTime, $timeTracker->getDateAt());
    }

    public function testSetHours()
    {
        $timeTracker = new TimeTracker();

        $timeTracker->setHours(1.5);
        $this->assertEquals(1.5, $timeTracker->getHours());
    }


    public function testSetEmployee()
    {
        $timeTracker = new TimeTracker();
        $project = new Project();

        $this->assertNull($timeTracker->getProject());
        $timeTracker->setProject($project);
        $this->assertEquals($project, $timeTracker->getProject());
    }

    public function testGetCreatedAt()
    {
        $timeTracker = new TimeTracker();
        $this->assertNull($timeTracker->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        $timeTracker = new TimeTracker();
        $this->assertNull($timeTracker->getUpdatedAt());
    }

    public function testSetDeletedAt()
    {
        $timeTracker = new TimeTracker();
        $dateTime = new \DateTime();

        $timeTracker->setDeletedAt($dateTime);
        $this->assertEquals($dateTime, $timeTracker->getDeletedAt());
    }
}
