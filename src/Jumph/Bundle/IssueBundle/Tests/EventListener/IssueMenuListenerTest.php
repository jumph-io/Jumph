<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\IssueBundle\Tests\EventListener;

use Jumph\Bundle\IssueBundle\EventListener\IssueMenuListener;

class IssueMenuListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testOnMenuIssue()
    {
        $buildMenuEventMock = \Mockery::mock('\Jumph\Bundle\AppBundle\Event\BuildMenuEvent');
        $itemInterfaceMock = \Mockery::mock('\Knp\Menu\ItemInterface');
        $itemInterfaceMock->shouldReceive('addChild')->once()->andReturnSelf();
        $buildMenuEventMock->shouldReceive('getMenu')->once()->andReturn($itemInterfaceMock);

        $issueMenuListener = new IssueMenuListener();
        $this->assertNull($issueMenuListener->onMenuIssue($buildMenuEventMock));
    }
}
