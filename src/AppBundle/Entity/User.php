<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users are the representation of the current user and his or her permissions
 *
 * @ORM\Entity
 * @ORM\Table(name="USERS")
 */
class User implements UserInterface
{
    public function __construct()
    {
        $this->IsActive = true;
        $this->Roles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function equals(UserInterface $user)
    {
        return $user->getUsername() == $this->getUsername();
    }

    public function eraseCredentials()
    {
    }

    public function getSalt()
    {
        return null;
    }

    /* Email *******************************************************/

    /**
     * @var string $Email The user's email address
     *
     * @ORM\Column(name="USER_EMAIL", type="string", length=100, nullable=false)
     */
    private $Email;

    /**
     * Exposes the private email address property for read access
     *
     * @return string The user's email address
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Changes the value of the private email address property
     *
     * @param string $Email The new email address value
     *
     * @return object This entity object
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /* Id *******************************************************/

    /**
     * @var integer $Id The user's unique numeric id value
     *
     * @ORM\Column(name="USER_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $Id;

    /**
     * Exposes the private unique numeric id value property for read access
     *
     * @return integer The user's unique numeric id value
     */
    public function getId()
    {
        return $this->Id;
    }

    /* IsActive *******************************************************/

    /**
     * @var boolean $IsActive The user's activity status
     *
     * @ORM\Column(name="USER_ACTIVE", type="boolean", nullable=false)
     */
    private $IsActive;

    /**
     * Exposes the private activity status property for read access
     *
     * @return boolean The user's activity status
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }

    /**
     * Changes the value of the private activity status property
     *
     * @param boolean $IsActive The new activity status value
     *
     * @return object This entity object
     */
    public function setIsActive($IsActive)
    {
        $this->IsActive = $IsActive;
        return $this;
    }

    /* Password *******************************************************/

    /**
     * @var string $Password The user's password
     *
     * @ORM\Column(name="USER_PASSWORD", type="string", length=50, nullable=false)
     */
    private $Password;

    /**
     * Exposes the private password property for read access
     *
     * @return string The user's password
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Changes the value of the private password property
     *
     * @param string $Password The new password value
     *
     * @return object This entity object
     */
    public function setPassword($Password)
    {
        // $Encoder = $this->get('security.password_encoder');
        // $EncodedPassword = $Encoder->encodePassword($this, $Password);
        // $this->Password = $EncodedPassword;
        $this->Password = $Password;
        return $this;
    }

    /* Roles *******************************************************/

    /**
     * @var \Doctrine\Common\Collections\Collection $Roles The user's roles
     *
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(
     *     name="USER_ROLES",
     *     joinColumns={
     *         @ORM\JoinColumn(
     *             name="USER_ID",
     *             referencedColumnName="USER_ID",
     *             nullable=false
     *         )
     *     },
     *     inverseJoinColumns={
     *         @ORM\JoinColumn(
     *             name="ROLE_ID",
     *             referencedColumnName="ROLE_ID",
     *             nullable=false
     *         )
     *     }
     * )
     */
    private $Roles;

    /**
     * Add a role to the user's collection
     *
     * @param \AppBundle\Entity\Role $Role
     *
     * @return object This entity object
     */
    public function addRole(\AppBundle\Entity\Role $Role)
    {
        $this->Roles[] = $Role;
        return $this;
    }

    /**
     * Exposes the private roles property for read access
     *
     * @return \Doctrine\Common\Collections\Collection The user's roles
     */
    public function getRoles()
    {
        // dump($this->Roles);
        // return $this->Roles;
        return array('ROLE_ADMIN');
    }

    /**
     * Remove a role from the user's collection
     *
     * @param \AppBundle\Entity\Role $Role
     */
    public function removeRole(\AppBundle\Entity\Role $Role)
    {
        $this->Roles->removeElement($Role);
    }

    /* Username *******************************************************/

    /**
     * @var string $Username The user's login name
     *
     * @ORM\Column(name="USER_NAME", type="string", length=50, nullable=false, unique=true)
     */
    private $Username;

    /**
     * Exposes the private login name property for read access
     *
     * @return string The user's login name
     */
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * Changes the value of the private login name property
     *
     * @param string $Username The new login name value
     *
     * @return object This entity object
     */
    public function setUsername($Username)
    {
        $this->Username = $Username;
        return $this;
    }
}
