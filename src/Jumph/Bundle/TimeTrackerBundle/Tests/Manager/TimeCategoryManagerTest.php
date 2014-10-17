<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 8/14/14
 * Time: 10:51 PM
 */

namespace Jumph\Bundle\TimeTrackerBundle\Tests\Manager;


use Jumph\Bundle\TimeTrackerBundle\Entity\TimeCategory;
use Jumph\Bundle\TimeTrackerBundle\Manager\TimeCategoryManager;

class TimeCategoryManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TimeCategoryManager
     */
    protected $timeCategoryManager;

    /**
     * @var ObjectManager
     */
    protected $objectManagerMock;

    public function setUp()
    {

        $this->objectManagerMock = \Mockery::mock('\Doctrine\Common\Persistence\ObjectManager');
        $this->timeCategoryManager = new TimeCategoryManager($this->objectManagerMock);
    }

    public function testCreate()
    {
        $timeCategory = new TimeCategory();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($timeCategory)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->timeCategoryManager->create($timeCategory);
    }

    public function testUpdate()
    {
        $timeCategory = new TimeCategory();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($timeCategory)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->timeCategoryManager->update($timeCategory);
    }

    public function testDelete()
    {
        $timeCategory = new TimeCategory();
        $this->objectManagerMock->shouldReceive('remove')->once()->with($timeCategory)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->timeCategoryManager->delete($timeCategory);
    }
}
