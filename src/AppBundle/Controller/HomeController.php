<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    protected function calcNavMenu()
    {
        return array (
            array (
                "Caption" => "Home",
                "Route" => "home"
            ),
            array (
                "Caption" => "Resume",
                "Route" => "resume"
            ),
            array (
                "Caption" => "Portfolio",
                "Route" => "portfolio"
            ),
            array (
                "Caption" => "Blog",
                "Route" => "blog"
            ),
        );
    }

    public function displayAction()
    {
        return $this->render(
            "base.html.twig",
            array (
                "body" => "Hello!",
                "navMenu" => $this->calcNavMenu(),
                "portfolio" => array (
                    "heading" => "Current Projects",
                    "projects" => $this->calcProjects(),
                    "route" => "portfolio"
                ),
                "subtitle" => "Delphi and PHP programmer in Atlanta, Georgia",
                "title" => "Dave Leach"
            )
        );
    }

    protected function calcProjects()
    {
        return array (
            array (
                "name" => "daveleach.work",
                "description" => "A website for my professional projects and
                    blog, as well as a sandbox to learn new technologies. You're
                    probably looking at it at this very moment!",
                //"image" => "daveleachwork.jpg",
                "route" => "project_daveleach"
            ),
            array (
                "name" => "Soundscape",
                "description" => "Website, hosting, and feed for Soundscape, a
                    progressive rock podcast",
                //"image" => "daveleachwork.jpg",
                "route" => "project_soundscape"
            ),
            array (
                "name" => "Renewal Therapeutic Bodyworks",
                "description" => "Website and hosting for Renewal Therapeutic
                    Bodyworks, a massage therapy company",
                //"image" => "daveleachwork.jpg",
                "route" => "project_rtbmassage"
            )
        );
    }
}

?>
