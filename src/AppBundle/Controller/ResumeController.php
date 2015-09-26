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
        $QueryResult = $this->getDoctrine()
            ->getRepository("AppBundle:Job")
            ->findAll();

        $Jobs = array();

        foreach ($QueryResult as $ResultJob)
        {
            /* Create custom job classes based on the Doctrine classes */
            $Jobs[] = new \AppBundle\Custom\Job($ResultJob);
        }

        return $Jobs;
    }
}

?>
