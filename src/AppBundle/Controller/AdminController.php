<?php

namespace AppBundle\Controller;

class AdminController extends BaseController
{
    protected function displayAdditionalNav()
    {
        return array (
            array (
                "Caption" => "Logout",
                "Route" => "logout"
            ),
        );
    }

    protected function displayTemplate()
    {
        return 'admin.html.twig';
    }
}

?>
