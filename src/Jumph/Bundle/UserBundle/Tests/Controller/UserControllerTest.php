<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\UserBundle\Tests\Controller;

use Jumph\Bundle\AppBundle\Tests\BaseWebTestCase;

/**
 * Functional user controller tests
 */
class UserControllerTest extends BaseWebTestCase
{

    /**
     * Test set up
     */
    public function setUp()
    {
        parent::setUp();

        $fixtures = array(
            'Jumph\Bundle\UserBundle\DataFixtures\ORM\LoadUserData',
        );

        $this->loadFixtures($fixtures);
    }

    /**
     * Test the overview method
     */
    public function testOverview()
    {
        $this->client->request('GET', '/users');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }
}
