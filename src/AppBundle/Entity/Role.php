<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roles are the groups to which a user belongs and which define permissions
 *
 * @ORM\Entity
 * @ORM\Table(name="ROLES")
 */
class Role
{
    /* DESCRIPTION ************************************************************/

    /**
     * @var string $description Description of the role
     *
     * @ORM\Column(name="ROLE_DESCRIPTION", type="text")
     */
    private $description;

    /**
     * Exposes the private description property for read access
     *
     * @return string The role's description
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
     * @var integer $id Unique value identifying this role
     *
     * @ORM\Column(name="ROLE_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Exposes the private id property for read access
     *
     * @return integer The role's record id
     */
    public function getId()
    {
        return $this->id;
    }

    // /* USER *******************************************************************/
    //
    // /**
    //  * @var \AppBundle\Entity\User $user The user to which this role applies
    //  *
    //  * @ORM\ManyToOne(
    //  *     targetEntity="User",
    //  *     inversedBy="Roles"
    //  * )
    //  * @ORM\JoinColumn(
    //  *     name="ROLE_ID",
    //  *     referencedColumnName="USER_ID"
    //  * )
    //  */
    // private $user;
    //
    // /**
    //  * Exposes the private user property for read access
    //  *
    //  * @return \AppBundle\Entity\User The role's user
    //  */
    // public function getUser()
    // {
    //     return $this->user;
    // }
    //
    // /**
    //  * Changes the value of the private user property
    //  *
    //  * @param \AppBundle\Entity\User $user The new user value
    //  *
    //  * @return object This entity object
    //  */
    // public function setUser(\AppBundle\Entity\User $user = null)
    // {
    //     $this->user = $user;
    //     return $this;
    // }
}
