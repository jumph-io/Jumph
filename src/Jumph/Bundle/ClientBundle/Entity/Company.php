<?php

namespace Jumph\Bundle\ClientBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Jumph\Bundle\ProjectBundle\Entity\Project;

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
     * @var Collection
     */
    private $projects;

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
     * Constructor
     */
    public function __construct()
    {
        $this->employees = new ArrayCollection();
        $this->projects = new ArrayCollection();
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
        $employee->setCompany($this);
        return $this;
    }

    /**
     * Remove employees
     *
     * @param Employee $employee
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
     * Get projects
     *
     * @return Collection
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Add projects
     *
     * @param Project $project
     * @return Company
     */
    public function addProject(Project $project)
    {
        $this->projects[] = $project;
        $project->setCompany($this);
        return $this;
    }

    /**
     * Remove projects
     *
     * @param Project $project
     */
    public function removeProject(Project $project)
    {
        $this->projects->removeElement($project);
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
     * @param \DateTime $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }
}
