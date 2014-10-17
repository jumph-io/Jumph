<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\Tests\Manager;

use Jumph\Bundle\ProjectBundle\Entity\ProjectStatus;
use Jumph\Bundle\ProjectBundle\Manager\ProjectStatusManager;

class ProjectStatusManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ProjectStatusManager
     */
    protected $projectStatusManager;

    /**
     * @var ObjectManager
     */
    protected $objectManagerMock;

    public function setUp()
    {

        $this->objectManagerMock = \Mockery::mock('\Doctrine\Common\Persistence\ObjectManager');
        $this->projectStatusManager = new ProjectStatusManager($this->objectManagerMock);
    }

    public function testCreate()
    {
        $projectStatus = new ProjectStatus();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($projectStatus)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->projectStatusManager->create($projectStatus);
    }

    public function testUpdate()
    {
        $projectStatus = new ProjectStatus();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($projectStatus)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->projectStatusManager->update($projectStatus);
    }

    public function testDelete()
    {
        $projectStatus = new ProjectStatus();
        $this->objectManagerMock->shouldReceive('remove')->once()->with($projectStatus)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->projectStatusManager->delete($projectStatus);
    }
}
