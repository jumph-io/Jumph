<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\TimeTrackerBundle\Tests\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\TimeTrackerBundle\Entity\TimeTracker;
use Jumph\Bundle\TimeTrackerBundle\Manager\TimeTrackerManager;

class TimeTrackerManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TimeTrackerManager
     */
    protected $timeTrackerManager;

    /**
     * @var ObjectManager
     */
    protected $objectManagerMock;

    public function setUp()
    {

        $this->objectManagerMock = \Mockery::mock('\Doctrine\Common\Persistence\ObjectManager');
        $this->timeTrackerManager = new TimeTrackerManager($this->objectManagerMock);
    }

    public function testCreate()
    {
        $timeTracker = new TimeTracker();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($timeTracker)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->timeTrackerManager->create($timeTracker);
    }

    public function testUpdate()
    {
        $timeTracker = new TimeTracker();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($timeTracker)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->timeTrackerManager->update($timeTracker);
    }

    public function testDelete()
    {
        $timeTracker = new TimeTracker();
        $this->objectManagerMock->shouldReceive('remove')->once()->with($timeTracker)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->timeTrackerManager->delete($timeTracker);
    }
}
