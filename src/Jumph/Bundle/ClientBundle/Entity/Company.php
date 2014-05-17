<?php

namespace Jumph\Bundle\ClientBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

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
     * @var Collection
     */
    private $employees;

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
        $this->users = new ArrayCollection();
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
     * Add employees
     *
     * @param Employee $employee
     * @return Company
     */
    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
        $employee->addCompany($this);
        return $this;
    }

    /**
     * Remove employees
     *
     * @param Employee $employees
     */
    public function removeEmployee(Employee $employee)
    {
        $this->employees->removeElement($employee);
    }

    /**
     * Get employees
     *
     * @return Collection
     */
    public function getEmployees()
    {
        return $this->employees;
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
