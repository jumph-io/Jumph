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
 * Functional time category controller tests
 */
class TimeCategoryControllerTest extends BaseWebTestCase
{

    /**
     * Test set up
     */
    public function setUp()
    {
        parent::setUp();

        $fixtures = array(
            'Jumph\Bundle\UserBundle\DataFixtures\ORM\LoadUserData',
            'Jumph\Bundle\TimeTrackerBundle\DataFixtures\ORM\LoadTimeCategoryData',
        );

        $this->loadFixtures($fixtures);

    }

    /**
     * Test the overview method
     */
    public function testOverview()
    {
        $this->client->request('GET', '/config/timetracker/category');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    /**
     * Test the view method
     */
    public function testView()
    {
        $this->markTestIncomplete("Missing controller method");
        //$this->client->request('GET', '/config/timetracker/category/view/1');
        //$this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    /**
     * Test the add method
     */
    public function testAdd()
    {
        $this->client->request('GET', '/config/timetracker/category/add');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->request('POST', '/config/timetracker/category/add');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    /**
     * Test the edit method
     */
    public function testEdit()
    {
        $this->markTestIncomplete("Missing controller method");
        //$this->client->request('GET', '/config/timetracker/category/edit/1');
        //$this->assertTrue($this->client->getResponse()->isSuccessful());

        //$this->client->request('POST', '/config/timetracker/category/edit/1');
        //$this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    /**
     * Test the delete method
     */
    public function testDelete()
    {
        $this->markTestIncomplete("Missing controller method");
        //$this->client->request('DELETE', '/config/timetracker/category/delete/1');
        //$this->assertTrue($this->client->getResponse()->isSuccessful());
    }
}
