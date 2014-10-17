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
    private $status;

    /**
     * @var ArrayCollection
     */
    private $timeTrackers;

    /**
     * @var \DateTime $createdAt
     */
    private $createdAt;

    /**
     * @var \DateTime $updatedAt
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
     *
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
     *
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
     *
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
     *
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
     * Set status
     *
     * @param ProjectStatus $status
     *
     * @return Project
     */
    public function setStatus(ProjectStatus $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return ProjectStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add timeTrackers
     *
     * @param TimeTracker $timeTrackers
     *
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
     * @return ArrayCollection
     */
    public function getTimeTrackers()
    {
        return $this->timeTrackers;
    }


    /**
     * Get creation date
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get update date
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Project
     */
    public function setDeletedAt(\DateTime $deletedAt)
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
