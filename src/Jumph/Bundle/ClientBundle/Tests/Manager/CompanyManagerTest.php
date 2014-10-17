<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\Tests\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\ClientBundle\Entity\Company;
use Jumph\Bundle\ClientBundle\Manager\CompanyManager;

class CompanyManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var CompanyManager
     */
    protected $companyManager;

    /**
     * @var ObjectManager
     */
    protected $objectManagerMock;

    public function setUp()
    {
        $this->objectManagerMock = \Mockery::mock('\Doctrine\Common\Persistence\ObjectManager');
        $this->companyManager = new CompanyManager($this->objectManagerMock);
    }

    public function testCreate()
    {
        $company = new Company();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($company)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->companyManager->create($company);
    }

    public function testUpdate()
    {
        $company = new Company();
        $this->objectManagerMock->shouldReceive('persist')->once()->with($company)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->companyManager->update($company);
    }

    public function testDelete()
    {
        $company = new Company();
        $this->objectManagerMock->shouldReceive('remove')->once()->with($company)->andReturn(true);
        $this->objectManagerMock->shouldReceive('flush')->once();

        $this->companyManager->delete($company);
    }
}
