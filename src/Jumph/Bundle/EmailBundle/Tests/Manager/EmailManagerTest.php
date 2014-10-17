<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle\Tests\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\EmailBundle\Entity\Email;
use Jumph\Bundle\EmailBundle\Manager\EmailManager;

class EmailManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var EmailManager
     */
    protected $emailManager;

    /**
     * @var ObjectManager
     */
    protected $objectManagerMock;

    public function setUp()
    {

        $this->objectManagerMock = \Mockery::mock('\Doctrine\Common\Persistence\ObjectManager');
        $this->emailManager = new EmailManager($this->objectManagerMock);
    }

    public function testCreate()
    {
        $email = new Email();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($email)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->emailManager->create($email);
    }

    public function testUpdate()
    {
        $email = new Email();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($email)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->emailManager->update($email);
    }

    public function testDelete()
    {
        $email = new Email();
        $this->objectManagerMock->shouldReceive('remove')->once()->with($email)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->emailManager->delete($email);
    }
}
