<?php

namespace Jumph\Bundle\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var date $createdAt
     */
    private $createdAt;

    /**
     * @var date $updatedAt
     */
    private $updatedAt;

    /**
     * @var date $deletedAt
     */
    private $deletedAt;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get first name of user
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set user first name
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get last name of user
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set user last name
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the name of a user
     *
     * @return string
     */
    public function getName()
    {
        return $this->getFirstname() . " " . $this->getLastname();
    }

    /**
     * Get creation date
     *
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get update date
     *
     * @return date
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Get deletion date
     *
     * @return date
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set deletion date
     *
     * @param $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }
}
