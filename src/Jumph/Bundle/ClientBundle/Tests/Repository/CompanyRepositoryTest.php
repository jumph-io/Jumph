<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\Tests\Repository;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Jumph\Bundle\ClientBundle\DataFixtures\ORM\LoadCompanyData;
use Jumph\Bundle\ClientBundle\Entity\Company;
use Jumph\Bundle\ClientBundle\Repository\CompanyRepository;
use Doctrine\Common\DataFixtures\Loader;

class CompanyRepositoryTest extends \PHPUnit_Framework_TestCase {

    protected $companyRepository;

    protected $em;

    public function setUp()
    {

        $this->em = \Mockery::mock('\Doctrine\ORM\EntityManager');
        $this->companyRepository = new CompanyRepository($this->em);
    }

    public function testCreate()
    {
        $company = new Company();
        $this->em->shouldReceive('persist')->once()->with($company)->andReturn(true);
        $this->em->shouldReceive('flush')->once();

        $this->companyRepository->create($company);
    }

    public function testUpdate()
    {
        $company = new Company();
        $this->em->shouldReceive('persist')->once()->with($company)->andReturn(true);
        $this->em->shouldReceive('flush')->once();

        $this->companyRepository->update($company);
    }

    public function testDelete()
    {
        $company = new Company();
        $this->em->shouldReceive('remove')->once()->with($company)->andReturn(true);
        $this->em->shouldReceive('flush')->once();

        $this->companyRepository->delete($company);
    }
}
