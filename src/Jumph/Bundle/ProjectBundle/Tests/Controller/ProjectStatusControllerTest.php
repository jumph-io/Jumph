<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\Tests\Controller;

use Jumph\Bundle\AppBundle\Tests\BaseWebTestCase;

/**
 * Functional project status controller tests
 */
class ProjectStatusControllerTest extends BaseWebTestCase
{
    /**
     * Test the overview method
     */
    public function testOverview()
    {
        $this->client->request('GET', '/config/projects/status');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    /**
     * Test the view method
     */
    public function testView()
    {
        $this->client->request('GET', '/config/projects/status/1/view');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    /**
     * Test the add method
     */
    public function testAdd()
    {
        $this->client->request('GET', '/config/projects/status/add');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->request('POST', '/config/projects/status/add');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    /**
     * Test the edit method
     */
    public function testEdit()
    {
        $this->client->request('GET', '/config/projects/status/1/edit');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->request('POST', '/config/projects/status/1/edit');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    /**
     * Test the delete method
     */
    public function testDelete()
    {
        $this->client->request('DELETE', '/config/projects/status/1/delete');
        $this->client->followRedirect();
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }
}
