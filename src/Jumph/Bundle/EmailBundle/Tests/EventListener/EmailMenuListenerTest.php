<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle\Tests\EventListener;

use Jumph\Bundle\EmailBundle\EventListener\EmailMenuListener;

class EmailMenuListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testOnMenuEmail()
    {
        $buildMenuEventMock = \Mockery::mock('\Jumph\Bundle\AppBundle\Event\BuildMenuEvent');
        $itemInterfaceMock = \Mockery::mock('\Knp\Menu\ItemInterface');
        $itemInterfaceMock->shouldReceive('addChild')->once()->andReturnSelf();
        $buildMenuEventMock->shouldReceive('getMenu')->once()->andReturn($itemInterfaceMock);

        $emailMenuListener = new EmailMenuListener();
        $this->assertNull($emailMenuListener->onMenuEmail($buildMenuEventMock));
    }
}
