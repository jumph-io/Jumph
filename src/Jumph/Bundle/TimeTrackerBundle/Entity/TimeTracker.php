<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\TimeTrackerBundle\Entity;

use Jumph\Bundle\ProjectBundle\Entity\Project;

class TimeTracker
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var TimeCategory
     */
    private $category;

    /**
     * @var Project
     */
    private $project;

    /**
     * @var \DateTime
     */
    private $dateAt;

    /**
     * @var string
     */
    private $hours;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->date = new \DateTime();
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
     * Set description
     *
     * @param string $description
     *
     * @return TimeTracker
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
     * Set project
     *
     * @param Project $project
     *
     * @return TimeTracker
     */
    public function setProject(Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set category
     *
     * @param TimeCategory $category
     *
     * @return TimeTracker
     */
    public function setCategory(TimeCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return TimeCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set date
     *
     * @param \DateTime $dateAt
     *
     * @return TimeTracker
     */
    public function setDateAt(\DateTime $dateAt)
    {
        $this->dateAt = $dateAt;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDateAt()
    {
        return $this->dateAt;
    }

    /**
     * Set hours
     *
     * @param string $hours
     *
     * @return TimeTracker
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return string 
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get updatedAt
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
     * @return TimeTracker
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
