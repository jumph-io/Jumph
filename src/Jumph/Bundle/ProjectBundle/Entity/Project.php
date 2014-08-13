<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\Entity;

use Jumph\Bundle\ClientBundle\Entity\Employee;
use Jumph\Bundle\ClientBundle\Entity\Company;
use Jumph\Bundle\TimeTrackerBundle\Entity\TimeTracker;
use Doctrine\Common\Collections\ArrayCollection;

class Project
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
     * @var string
     */
    private $description;

    /**
     * @var Company
     */
    private $company;

    /**
     * @var Employee
     */
    private $employee;

    /**
     * @var ProjectStatus
     */
    private $projectStatus;

    /**
     * @var ArrayCollection
     */
    private $timeTrackers;

    /**
     * @var date $createdAt
     */
    private $createdAt;

    /**
     * @var date $updatedAt
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $deletedAt;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->timeTrackers = new ArrayCollection();
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
     * @return Project
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
     * Set description
     *
     * @param string $description
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set company
     *
     * @param Company $company
     * @return Project
     */
    public function setCompany(Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set employee
     *
     * @param Employee $employee
     * @return Project
     */
    public function setEmployee(Employee $employee = null)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return Employee
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Set projectStatus
     *
     * @param ProjectStatus $projectStatus
     * @return Project
     */
    public function setProjectStatus(ProjectStatus $projectStatus = null)
    {
        $this->projectStatus = $projectStatus;

        return $this;
    }

    /**
     * Get projectStatus
     *
     * @return ProjectStatus
     */
    public function getProjectStatus()
    {
        return $this->projectStatus;
    }

    /**
     * Add timeTrackers
     *
     * @param TimeTracker $timeTrackers
     * @return Project
     */
    public function addTimeTracker(TimeTracker $timeTrackers)
    {
        $this->timeTrackers[] = $timeTrackers;

        return $this;
    }

    /**
     * Remove timeTrackers
     *
     * @param TimeTracker $timeTrackers
     */
    public function removeTimeTracker(TimeTracker $timeTrackers)
    {
        $this->timeTrackers->removeElement($timeTrackers);
    }

    /**
     * Get timeTrackers
     *
     * @return Collection
     */
    public function getTimeTrackers()
    {
        return $this->timeTrackers;
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Project
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }
}
