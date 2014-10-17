<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\UserBundle\Tests\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\UserBundle\Entity\User;
use Jumph\Bundle\UserBundle\Manager\UserManager;

class UserManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var UserManager
     */
    protected $userManager;

    /**
     * @var ObjectManager
     */
    protected $objectManagerMock;

    public function setUp()
    {

        $this->objectManagerMock = \Mockery::mock('\Doctrine\Common\Persistence\ObjectManager');
        $this->userManager = new UserManager($this->objectManagerMock);
    }

    public function testCreate()
    {
        $user = new User();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($user)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->userManager->create($user);
    }

    public function testUpdate()
    {
        $user = new User();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($user)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->userManager->update($user);
    }

    public function testDelete()
    {
        $user = new User();
        $this->objectManagerMock->shouldReceive('remove')->once()->with($user)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->userManager->delete($user);
    }
}
