<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

 /**
  * Projects are items within the portfolio
  *
  * @ORM\Entity
  * @ORM\Table(name="PROJECTS")
  */
class Project
{
    /**
     * The project class constructor
     */
    public function __construct()
    {
        $this->TechnologySet = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /* Description *******************************************************/

    /**
     * @var string $Description The project's description
     *
     * @ORM\Column(name="PROJ_DESCRIPTION", type="text",
     *     nullable=false, options={"default":"description"})
     */
    private $Description;

    /**
     * Exposes the private description property for read access
     *
     * @return string The project's description
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Changes the value of the private description property
     *
     * @param string $Description The new description value
     *
     * @return object This entity object
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /* Id *******************************************************/

    /**
     * @var integer $Id The project's unique record id
     *
     * @ORM\Column(name="PROJ_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $Id;

    /**
     * Exposes the private unique record id property for read access
     *
     * @return integer The project's unique record id
     */
    public function getId()
    {
        return $this->Id;
    }

    /* Name *******************************************************/

    /**
     * @var string $Name The project's name
     *
     * @ORM\Column(name="PROJ_NAME", type="string", length=100,
     *     nullable=false, options={"default":"name"})
     */
    private $Name;

    /**
     * Exposes the private name property for read access
     *
     * @return string The project's name
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Changes the value of the private name property
     *
     * @param string $Name The new name value
     *
     * @return object This entity object
     */
    public function setName($Name)
    {
        $this->Name = $Name;
        return $this;
    }

    /* ShortName *******************************************************/

    /**
     * @var string $ShortName The project's short name, used for routing
     *
     * @ORM\Column(name="PROJ_SHORT_NAME", type="string", length=20,
     *     nullable=false, options={"default":"shortname"}, unique=true)
     */
    private $ShortName;

    /**
     * Exposes the private short name property for read access
     *
     * @return string The project's short name
     */
    public function getShortName()
    {
        return $this->ShortName;
    }

    /**
     * Changes the value of the private short name property
     *
     * @param string $ShortName The new short name value
     *
     * @return object This entity object
     */
    public function setShortName($ShortName)
    {
        $this->ShortName = $ShortName;
        return $this;
    }

    /* Synopsis *******************************************************/

    /**
     * @var string $Synopsis The projects's synopsis
     *
     * @ORM\Column(name="PROJ_SYNOPSIS", type="text", nullable=true,
     *     options={"default":null})
     */
    private $Synopsis;

    /**
     * Exposes the private synopsis property for read access
     *
     * @return string The projects's synopsis
     */
    public function getSynopsis()
    {
        return $this->Synopsis;
    }

    /**
     * Changes the value of the private synopsis property
     *
     * @param string $Synopsis The new synopsis value
     *
     * @return object This entity object
     */
    public function setSynopsis($Synopsis)
    {
        $this->Synopsis = $Synopsis;
        return $this;
    }

    /* TechnologySet *******************************************************/

    /**
     * @var \Doctrine\Common\Collections\Collection Technology The project's
     *     technology collection
     *
     * @ORM\ManyToMany(targetEntity="Technology")
     * @ORM\JoinTable(
     *     name="PROJECT_TECHNOLOGIES",
     *     joinColumns={
     *         @ORM\JoinColumn(
     *             name="PROJ_ID",
     *             referencedColumnName="PROJ_ID",
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
    private $TechnologySet;

    /**
     * Add a technology to the project's collection
     *
     * @param \AppBundle\Entity\Technology $Technology
     *
     * @return object This entity object
     */
    public function addTechnology(\AppBundle\Entity\Technology $Technology)
    {
        $this->TechnologySet[] = $Technology;
        return $this;
    }

    /**
     * Exposes the private technology collection property for read access
     *
     * @return \Doctrine\Common\Collections\Collection The project's technology
     *     collection
     */
    public function getTechnologySet()
    {
        return $this->TechnologySet;
    }

    /**
     * Remove a technology from the project's collection
     *
     * @param \AppBundle\Entity\Technology $Technology
     */
    public function removeTechnology(\AppBundle\Entity\Technology $Technology)
    {
        $this->TechnologySet->removeElement($Technology);
    }
}
