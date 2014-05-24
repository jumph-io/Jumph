<?php

namespace Jumph\Bundle\UserBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;

class Role implements RoleInterface
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $role;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $users;

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

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * @see RoleInterface
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Role
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
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
     * @return Role
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
     * @param User $user
     * @return Role
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;
        $user->addRole($this);
        return $this;
    }

    /**
     * Remove users
     *
     * @param User $user
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);
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
