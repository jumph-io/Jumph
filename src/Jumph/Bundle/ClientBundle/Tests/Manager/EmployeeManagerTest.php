<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\Tests\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\ClientBundle\Entity\Employee;
use Jumph\Bundle\ClientBundle\Manager\EmployeeManager;

class EmployeeManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var EmployeeManager
     */
    protected $employeeManager;

    /**
     * @var ObjectManager
     */
    protected $objectManagerMock;

    public function setUp()
    {

        $this->objectManagerMock = \Mockery::mock('\Doctrine\Common\Persistence\ObjectManager');
        $this->employeeManager = new EmployeeManager($this->objectManagerMock);
    }

    public function testCreate()
    {
        $employee = new Employee();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($employee)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->employeeManager->create($employee);
    }

    public function testUpdate()
    {
        $employee = new Employee();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($employee)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->employeeManager->update($employee);
    }

    public function testDelete()
    {
        $employee = new Employee();
        $this->objectManagerMock->shouldReceive('remove')->once()->with($employee)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->employeeManager->delete($employee);
    }
}
