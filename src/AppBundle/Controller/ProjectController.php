<?php

namespace AppBundle\Controller;

class ProjectController extends BaseController
{
    private $Project = null;

    public function displayAction($shortname = null)
    {
        $this->fetchProject($shortname);
        return parent::displayAction();
    }

    protected function displayBodyClass()
    {
        return "right-sidebar";
    }

    protected function displayParameters()
    {
        return array (
            "project" => $this->Project
        );
    }

    protected function displayTemplate()
    {
        return 'project.html.twig';
    }

    protected function fetchProject($shortname)
    {
        $QueryResult = $this->Project = $this->getDoctrine()
            ->getRepository("AppBundle:Project")
            ->findBy(array ("shortname" => $shortname));

        if (count($QueryResult) == 1) {
            $Project = $QueryResult[0];
        } else {
            $Project = null;
        };

        dump($Project);
        $this->Project = $Project;
    }
}

?>
