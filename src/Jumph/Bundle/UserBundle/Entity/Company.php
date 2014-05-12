<?php

namespace Jumph\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Company
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * @var date $created
     */
    private $created;

    /**
     * @var date $updated
     */
    private $updated;

    /**
     * @var date $deletedAt
     */
    private $deletedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add users
     *
     * @param User $users
     * @return Company
     */
    public function addUser(User $users)
    {
        $this->users[] = $users;
        $users->addCompany($this);
        return $this;
    }

    /**
     * Remove users
     *
     * @param User $users
     */
    public function removeUser(User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Get creation date
     *
     * @return date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get update date
     *
     * @return date
     */
    public function getUpdated()
    {
        return $this->updated;
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
