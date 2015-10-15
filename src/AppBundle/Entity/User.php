<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users are the representation of the current user and his or her permissions
 *
 * @ORM\Entity
 * @ORM\Table(name="USERS")
 */
class User extends BaseUser
{
    /**
     * @var integer $id The unique id of the user's record
     *
     * @ORM\Column(name="USER_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
