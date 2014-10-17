<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\AppBundle\Tests;

use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Base methods for test cases
 */
class BaseWebTestCase extends WebTestCase
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * Test set up
     */
    public function setUp()
    {
        parent::setUp();

        $this->client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'jumph',
            'PHP_AUTH_PW'   => 'jumphpassword',
        ));

        $fixtures = array(
            'Jumph\Bundle\UserBundle\DataFixtures\ORM\LoadUserData',
            'Jumph\Bundle\EmailBundle\DataFixtures\ORM\LoadEmailData',
            'Jumph\Bundle\ClientBundle\DataFixtures\ORM\LoadCompanyData',
            'Jumph\Bundle\ClientBundle\DataFixtures\ORM\LoadEmployeeData',
            'Jumph\Bundle\ProjectBundle\DataFixtures\ORM\LoadProjectData',
            'Jumph\Bundle\ProjectBundle\DataFixtures\ORM\LoadProjectStatusData',
            'Jumph\Bundle\TimeTrackerBundle\DataFixtures\ORM\LoadTimeTrackerData',
            'Jumph\Bundle\TimeTrackerBundle\DataFixtures\ORM\LoadTimeCategoryData',
        );

        $this->loadFixtures($fixtures);
    }
}
