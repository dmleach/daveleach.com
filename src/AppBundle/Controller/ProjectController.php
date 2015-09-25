<?php

namespace AppBundle\Controller;

class ProjectController extends BaseController
{
    private $ShortName = null;

    public function displayAction($shortname = null)
    {
        $this->ShortName = $shortname;
        return parent::displayAction();
    }

    protected function displayBodyClass()
    {
        return "right-sidebar";
    }

    protected function displayParameters()
    {
        return array (
            "name" => $this->ShortName
        );
    }

    protected function displayTemplate()
    {
        return 'project.html.twig';
    }
}

?>
