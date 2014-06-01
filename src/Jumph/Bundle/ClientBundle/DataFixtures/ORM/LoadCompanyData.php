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
        $company->setName('Google');

        $manager->persist($company);
        $manager->flush();

        $this->addReference('google', $company);

        // Second company
        $company = new Company();
        $company->setName('Microsoft');

        $manager->persist($company);
        $manager->flush();

        $this->addReference('microsoft', $company);

        // Third company
        $company = new Company();
        $company->setName('Apple');
        $company->setDeletedAt(new \DateTime());

        $manager->persist($company);
        $manager->flush();

        $this->addReference('apple', $company);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
