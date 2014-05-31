<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\ClientBundle\Entity\Company;

class LoadCompanyData  extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // First company
        $company = new Company();
        $company->setName('Company 1');

        $manager->persist($company);
        $manager->flush();

        //$this->addReference('company-1', $company);

        // Second company
        $company = new Company();
        $company->setName('Company 2');

        $manager->persist($company);
        $manager->flush();

        //$this->addReference('company-2', $company);

        // Third company
        $company = new Company();
        $company->setName('Company 3');
        $company->setDeletedAt(new \DateTime());

        $manager->persist($company);
        $manager->flush();

        //$this->addReference('company-3', $company);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
