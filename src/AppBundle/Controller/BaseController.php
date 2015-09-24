<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    protected function calcNavMenu()
    {
        return array (
            array (
                "Caption" => "Home",
                "Route" => "home"
            ),
            // array (
            //     "Caption" => "Resume",
            //     "Route" => "resume"
            // ),
            // array (
            //     "Caption" => "Portfolio",
            //     "Route" => "portfolio"
            // ),
            // array (
            //     "Caption" => "Blog",
            //     "Route" => "blog"
            // ),
        );
    }

    protected function displayBodyClass()
    {
        return "no-sidebar";
    }

    protected function displayParameters()
    {
        return array ();
    }

    protected function displayParametersBase()
    {
        return array (
            "bodyclass" => $this->displayTemplate(),
            "navMenu" => $this->calcNavMenu(),
            "title" => "Dave Leach"
        );
    }

    protected function displayTemplate()
    {
        return "base.html.twig";
    }

    public function displayAction()
    {
        return $this->render(
            $this->displayTemplate(),
            array_merge (
                $this->displayParametersBase(),
                $this->displayParameters()
            )
        );
    }
}

?>
