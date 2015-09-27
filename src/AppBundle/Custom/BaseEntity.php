<?php

namespace AppBundle\Custom;

class BaseEntity
{
    /**
     * Extends a Doctrine-generated entity class by absorbing the private
     * properties using the public get methods.
     *
     * Normal inheritance won't work in this situation because there's no way
     * to have Doctrine instantiate a custom class when data is fetched from
     * the database as opposed to the automatically-created entity objects.
     */
    public function __construct($BaseEntity)
    {
        /* Gets a list of the methods from the Doctrine entity */
        $Methods = get_class_methods($BaseEntity);

        foreach ($Methods as $Method) {
            /* Check to see if this is a property getting method, all of which
               start "get" */
            if (substr($Method, 0, 3) == "get") {
                /* By removing the "get," you're left with the matching property
                   names */
                $PropertyName = strtolower(substr($Method, 3));
                $this->$PropertyName = $BaseEntity->$Method();
            }
        }
    }
}

?>
