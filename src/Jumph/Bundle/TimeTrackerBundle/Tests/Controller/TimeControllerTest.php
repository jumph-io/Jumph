<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\TimeTrackerBundle\Tests\Controller;

use Jumph\Bundle\AppBundle\Tests\BaseWebTestCase;

/**
 * Functional time controller tests
 */
class TimeControllerTest extends BaseWebTestCase
{
    /**
     * Test the overview method
     */
    public function testOverview()
    {
        $this->client->request('GET', '/timetracker');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    /**
     * Test the add method
     */
    public function testAdd()
    {
        $this->client->request('POST', '/timetracker/add');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }
}
