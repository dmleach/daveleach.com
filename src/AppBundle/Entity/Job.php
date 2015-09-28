<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jobs represent the employment history that appears on a resume
 *
 * @ORM\Entity
 * @ORM\Table(name="JOBS")
 */
class Job
{
    /**
     * The job class constructor
     */
    public function __construct()
    {
        $this->Technologies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /* Accomplishments *******************************************************/

    /**
     * @var \Doctrine\Common\Collections\Collection $Accomplishments The job's
     *     accomplishments collection
     *
     * @ORM\OneToMany(
     *     targetEntity="Accomplishment",
     *     mappedBy="job"
     * )
     */
    private $Accomplishments;

    /**
     * Add an accomplishment to the job's collection
     *
     * @param \AppBundle\Entity\Accomplishment $Accomplishment
     *
     * @return object This entity object
     */
    public function addAccomplishment(\AppBundle\Entity\Accomplishment $Accomplishment)
    {
        $this->Accomplishments[] = $Accomplishment;
        return $this;
    }

    /**
     * Exposes the private accomplishments collection property for read access
     *
     * @return \Doctrine\Common\Collections\Collection The job's accomplishments
     *     collection
     */
    public function getAccomplishments()
    {
        return $this->Accomplishments;
    }

    /**
     * Remove an accomplishment from the job's collection
     *
     * @param \AppBundle\Entity\Accomplishment $Accomplishment
     */
    public function removeAccomplishment(\AppBundle\Entity\Accomplishment $Accomplishment)
    {
        $this->Accomplishments->removeElement($Accomplishment);
    }

    /* COMPANY ****************************************************************/

    /**
     * @var string $company Name of the company where the job took place
     *
     * @ORM\Column(name="JOB_COMPANY", type="string", length=50)
     */
    private $company;

    /**
     * Exposes the private company property for read access
     *
     * @return string The job's company name
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Changes the value of the private company property
     *
     * @param string $company The new company value
     *
     * @return object This entity object
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /* EndDate *******************************************************/

    /**
     * @var DateTime $EndDate The job's employment end date
     *
     * @ORM\Column(type="date", name="JOB_END", nullable=true,
     *     options={"default":null})
     */
    private $EndDate;

    /**
     * Exposes the private employment end date property for read access
     *
     * @return DateTime The job's employment end date
     */
    public function getEndDate()
    {
        return $this->EndDate;
    }

    /**
     * Formats the end date for output as a month and year
     *
     * @return string The job's formatted employment end date
     */
    public function getEndMonthYear()
    {
        return ($this->EndDate === null? null : $this->EndDate->format("F Y"));
    }

    /**
     * Changes the value of the private employment end date property
     *
     * @param DateTime $EndDate The new employment end date value
     *
     * @return object This entity object
     */
    public function setEndDate($EndDate)
    {
        $this->EndDate = $EndDate;
        return $this;
    }

    /* ID *********************************************************************/

    /**
     * @var integer $id Unique value identifying this record
     *
     * @ORM\Column(name="JOB_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Exposes the private id property for read access
     *
     * @return integer The job's record id
     */
    public function getId()
    {
        return $this->id;
    }

    /* StartDate *******************************************************/

    /**
     * @var DateTime $StartDate The job's employment start date
     *
     * @ORM\Column(name="JOB_START", type="date", nullable=false)
     */
    private $StartDate;

    /**
     * Exposes the private StartDate property for read access
     *
     * @return DateTime The job's employment start date
     */
    public function getStartDate()
    {
        return $this->StartDate;
    }

    /**
     * Formats the start date for output as a month and year
     *
     * @return string The job's formatted employment start date
     */
    public function getStartMonthYear()
    {
        return ($this->StartDate === null? null : $this->StartDate->format("F Y"));
    }

    /**
     * Changes the value of the private employment start date property
     *
     * @param DateTime $StartDate The new employment start date value
     *
     * @return object This entity object
     */
    public function setStartDate($StartDate)
    {
        $this->StartDate = $StartDate;
        return $this;
    }

    /* Technologies *******************************************************/

    /**
     * @var \Doctrine\Common\Collections\Collection $Technologies The job's
     *     technologies used
     *
     * @ORM\ManyToMany(targetEntity="Technology")
     * @ORM\JoinTable(
     *     name="JOB_TECHNOLOGIES",
     *     joinColumns={
     *         @ORM\JoinColumn(
     *             name="JOB_ID",
     *             referencedColumnName="JOB_ID",
     *             nullable=false
     *         )
     *     },
     *     inverseJoinColumns={
     *         @ORM\JoinColumn(
     *             name="TECH_ID",
     *             referencedColumnName="TECH_ID",
     *             nullable=false
     *         )
     *     }
     * )
     */
    private $Technologies;

    /**
     * Add a technology to the job's collection
     *
     * @param \AppBundle\Entity\Technology $Technology The technology to add
     *
     * @return object This entity object
     */
    public function addTechnology(\AppBundle\Entity\Technology $Technology)
    {
        $this->Technologies[] = $Technology;
        return $this;
    }

    /**
     * Exposes the private technologies used property for read access
     *
     * @return \Doctrine\Common\Collections\Collection The job's technologies used
     */
    public function getTechnologies()
    {
        return $this->Technologies;
    }

    /**
     * Remove a technology from the job's collection
     *
     * @param \AppBundle\Entity\Technology $Technology The technology to remove
     */
    public function removeTechnology(\AppBundle\Entity\Technology $Technology)
    {
        $this->Technologies->removeElement($Technology);
    }

    /* Title *******************************************************/

    /**
     * @var string $Title The job's title
     *
     * @ORM\Column(name="JOB_TITLE", type="string", length=100,
     *     nullable=true, options={"default":null})
     */
    private $Title;

    /**
     * Exposes the private title property for read access
     *
     * @return string The job's title
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Changes the value of the private title property
     *
     * @param string $Title The new title value
     *
     * @return object This entity object
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
        return $this;
    }
}
