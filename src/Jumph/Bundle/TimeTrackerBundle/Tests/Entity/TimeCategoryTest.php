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


use Jumph\Bundle\TimeTrackerBundle\Entity\TimeCategory;

class TimeCategoryTest extends \PHPUnit_Framework_TestCase
{

    public function testGetId()
    {
        $timeCategory = new TimeCategory();
        $this->assertNull($timeCategory->getId());
    }

    public function testSetName()
    {
        $timeCategory = new TimeCategory();

        $timeCategory->setName('Design');
        $this->assertEquals('Design', $timeCategory->getName());
    }

    public function testSetDescription()
    {
        $timeCategory = new TimeCategory();

        $timeCategory->setDescription('Everything like Photoshop, Illustrator, etc');
        $this->assertEquals('Everything like Photoshop, Illustrator, etc', $timeCategory->getDescription());
    }

    public function testGetCreatedAt()
    {
        $timeCategory = new TimeCategory();
        $this->assertNull($timeCategory->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        $timeCategory = new TimeCategory();
        $this->assertNull($timeCategory->getUpdatedAt());
    }

    public function testSetDeletedAt()
    {
        $timeCategory = new TimeCategory();
        $dateTime = new \DateTime();

        $timeCategory->setDeletedAt($dateTime);
        $this->assertEquals($dateTime, $timeCategory->getDeletedAt());
    }
}
