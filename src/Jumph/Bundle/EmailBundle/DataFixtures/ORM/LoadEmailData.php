<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Jumph\Bundle\EmailBundle\Entity\Email;

/**
 * Fixture for email data
 */
class LoadEmailData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $email = new Email();
            $email->setSubject($faker->sentence(6));
            $email->setBody($faker->paragraph(4));
            $email->setCompany($this->getReference('company-' . $faker->numberBetween(0, 9)));
            $email->setEmployee($this->getReference('employee-' . $faker->numberBetween(0, 9)));

            $this->addReference('email-'.$i, $email);
            $manager->persist($email);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 44;
    }
}
