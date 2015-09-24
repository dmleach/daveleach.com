<?php

namespace AppBundle\Controller;

class ProjectController extends BaseController
{
    protected function displayBodyClass()
    {
        return "right-sidebar";
    }

    protected function displayParameters()
    {
        return array (
            "name" => "Project name"
        );
    }

    protected function displayTemplate()
    {
        return 'project.html.twig';
    }
}

?>
