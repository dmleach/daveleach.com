<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accomplishments are the line items that appear on a resume below each job,
 * describing the responsibilities and projects done while employed there
 *
 * @ORM\Entity
 * @ORM\Table(name="ACCOMPLISHMENTS")
 */
class Accomplishment
{
    /* DESCRIPTION ************************************************************/

    /**
     * @var string $description Description of the accomplishment as it appears
     *    on a resume
     *
     * @ORM\Column(name="ACCO_DESCRIPTION", type="text")
     */
    private $description;

    /**
     * Exposes the private description property for read access
     *
     * @return string The accomplishment's description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Changes the value of the private description property
     *
     * @param string $description The new description value
     *
     * @return object This entity object
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /* ID *********************************************************************/

    /**
     * @var integer $id Unique value identifying this record
     *
     * @ORM\Column(name="ACCO_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Exposes the private id property for read access
     *
     * @return integer The accomplishment's record id
     */
    public function getId()
    {
        return $this->id;
    }

    /* JOB ********************************************************************/

    /**
     * @var \AppBundle\Entity\Job $job The job to which this accomplishment
     *     belongs
     *
     * @ORM\ManyToOne(
     *     targetEntity="Job",
     *     inversedBy="Accomplishments"
     * )
     * @ORM\JoinColumn(
     *     name="JOB_ID",
     *     referencedColumnName="JOB_ID"
     * )
     */
    private $job;

    /**
     * Exposes the private job property for read access
     *
     * @return \AppBundle\Entity\Job The accomplishment's job
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Changes the value of the private job property
     *
     * @param \AppBundle\Entity\Job $job The new job value
     *
     * @return object This entity object
     */
    public function setJob(\AppBundle\Entity\Job $job = null)
    {
        $this->job = $job;
        return $this;
    }
}
