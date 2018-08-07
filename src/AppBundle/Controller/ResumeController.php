<?php

namespace AppBundle\Controller;

class ResumeController extends BaseController
{
    protected function displayBodyClass()
    {
        return "right-sidebar";
    }

    protected function displayParameters()
    {
        return array (
            "jobs" => $this->FetchJobs()
        );
    }

    protected function displayTemplate()
    {
        return 'resume.html.twig';
    }

    protected function FetchJobs()
    {
        return $this->getDoctrine()
            ->getRepository("AppBundle:Job")
            ->findAll();
    }
}

?>
