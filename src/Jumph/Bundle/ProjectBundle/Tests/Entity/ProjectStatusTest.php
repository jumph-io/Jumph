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

use Jumph\Bundle\ProjectBundle\Entity\ProjectStatus;

class ProjectStatusTest extends \PHPUnit_Framework_TestCase
{

    public function testGetId()
    {
        $projectStatus = new ProjectStatus();
        $this->assertNull($projectStatus->getId());
    }

    public function testSetName()
    {
        $projectStatus = new ProjectStatus();

        $projectStatus->setName('Setup');
        $this->assertEquals('Setup', $projectStatus->getName());
    }

    public function testSetDescription()
    {
        $projectStatus = new ProjectStatus();

        $projectStatus->setDescription('The setup phase');
        $this->assertEquals('The setup phase', $projectStatus->getDescription());
    }

    public function testGetCreatedAt()
    {
        $projectStatus = new ProjectStatus();
        $this->assertNull($projectStatus->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        $projectStatus = new ProjectStatus();
        $this->assertNull($projectStatus->getUpdatedAt());
    }

    public function testSetDeletedAt()
    {
        $projectStatus = new ProjectStatus();
        $dateTime = new \DateTime();

        $projectStatus->setDeletedAt($dateTime);
        $this->assertEquals($dateTime, $projectStatus->getDeletedAt());
    }
}
