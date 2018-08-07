<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Constraint;

class Message
{
    /* Email *******************************************************/

    /**
     * @var string $Email The message sender's email address
     *
     * @Constraint\NotBlank()
     */
    private $Email;

    /**
     * Exposes the private email address property for read access
     *
     * @return string The message sender's email address
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

    /* Message *******************************************************/

    /**
     * @var string $Message The message's text
     *
     * @Constraint\NotBlank()
     */
    private $Message;

    /**
     * Exposes the private text property for read access
     *
     * @return string The message's text
     */
    public function getMessage()
    {
        return $this->Message;
    }

    /**
     * Changes the value of the private text property
     *
     * @param string $Message The new text value
     *
     * @return object This entity object
     */
    public function setMessage($Message)
    {
        $this->Message = $Message;
        return $this;
    }

    /* Name *******************************************************/

    /**
     * @var string $Name The message sender's name
     *
     * @Constraint\NotBlank()
     */
    private $Name;

    /**
     * Exposes the private name property for read access
     *
     * @return string The message sender's name
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

    /* Other methods *******************************************************/

    /**
     * Returns the form fields needed to collect this entity from the user
     *
     * @return array The fields and attributes used by the Symfony form builder
     */
    public static function getFormFields()
    {
        return array (
            array (
                "Field" => "Name",
                "Type" => "text",
                "Label" => "Your name"
            ),
            array (
                "Field" => "Email",
                "Type" => "email",
                "Label" => "Your email address"
            ),
            array (
                "Field" => "Message",
                "Type" => "textarea",
                "Label" => "Your message"
            ),
        );
    }
}
