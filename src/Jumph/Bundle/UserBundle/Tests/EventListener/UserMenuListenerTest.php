<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\UserBundle\Tests\EventListener;

use Jumph\Bundle\UserBundle\EventListener\UserMenuListener;

class UserMenuListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testOnMenuUser()
    {
        $buildMenuEventMock = \Mockery::mock('\Jumph\Bundle\AppBundle\Event\BuildMenuEvent');
        $itemInterfaceMock = \Mockery::mock('\Knp\Menu\ItemInterface');
        $itemInterfaceMock->shouldReceive('addChild')->once()->andReturnSelf();
        $buildMenuEventMock->shouldReceive('getMenu')->once()->andReturn($itemInterfaceMock);

        $userMenuListener = new UserMenuListener();
        $this->assertNull($userMenuListener->onMenuUser($buildMenuEventMock));
    }
}
