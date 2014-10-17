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

use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\ProjectBundle\Entity\Project;
use Jumph\Bundle\ProjectBundle\Manager\ProjectManager;

class ProjectManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ProjectManager
     */
    protected $projectManager;

    /**
     * @var ObjectManager
     */
    protected $objectManagerMock;

    public function setUp()
    {

        $this->objectManagerMock = \Mockery::mock('\Doctrine\Common\Persistence\ObjectManager');
        $this->projectManager = new ProjectManager($this->objectManagerMock);
    }

    public function testCreate()
    {
        $project = new Project();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($project)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->projectManager->create($project);
    }

    public function testUpdate()
    {
        $project = new Project();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($project)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->projectManager->update($project);
    }

    public function testDelete()
    {
        $project = new Project();
        $this->objectManagerMock->shouldReceive('remove')->once()->with($project)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->projectManager->delete($project);
    }
}
