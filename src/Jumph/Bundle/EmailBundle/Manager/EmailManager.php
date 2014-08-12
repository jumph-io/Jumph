<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\QueryBuilder;
use Jumph\Bundle\AppBundle\Entity\FilterableManagerInterface;
use Jumph\Bundle\EmailBundle\Entity\Email;

class EmailManager implements FilterableManagerInterface
{

    /**
     * Entity alias
     *
     * @var constant
     */
    const ENTITY_ALIAS = 'e';

    /**
     * Entity to use
     *
     * @var constant
     */
    const ENTITY_CLASS = 'JumphEmailBundle:Email';

    /**
     * Object manager
     *
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * Constructor.
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Create a email
     *
     * @param Email $email
     */
    public function create(Email $email)
    {
        $this->objectManager->persist($email);
        $this->objectManager->flush();
    }

    /**
     * Update a email
     *
     * @param Email $email
     */
    public function update(Email $email)
    {
        $this->objectManager->persist($email);
        $this->objectManager->flush();
    }

    /**
     * Delete a email
     *
     * @param Email $email
     */
    public function delete(Email $email)
    {
        $this->objectManager->remove($email);
        $this->objectManager->flush();
    }

    /**
     * Return a new query builder
     *
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->objectManager
            ->getRepository(self::ENTITY_CLASS)
            ->createQueryBuilder(self::ENTITY_ALIAS);
    }
}
