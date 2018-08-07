<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Technologies are programs and packages used in working on jobs and projects
 *
 * @ORM\Entity
 * @ORM\Table(name="TECHNOLOGIES")
 */
class Technology
{
    /* Id *********************************************************************/

    /**
     * @var integer $Id The technology's unique record id
     *
     * @ORM\Column(name="TECH_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $Id;

    /**
     * Exposes the private unique record id property for read access
     *
     * @return integer The technology's unique record id
     */
    public function getId()
    {
        return $this->Id;
    }

    /* Name *******************************************************/

    /**
     * @var string $Name The technology's name
     *
     * @ORM\Column(name="TECH_NAME", type="string", length=100,
     *     nullable=false, options={"default":"name"})
     */
    private $Name;

    /**
     * Exposes the private name property for read access
     *
     * @return string The technology's name
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
     * @var string $ShortName The technology's short name, used for routing
     *
     * @ORM\Column(name="TECH_SHORT_NAME", type="string", length=20,
     *     nullable=false, options={"default":"shortname"}, unique=true)
     */
    private $ShortName;

    /**
     * Exposes the private short name property for read access
     *
     * @return string The technology's short name
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
}
