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
            array (
                "Caption" => "Resume",
                "Route" => "resume"
            ),
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

    protected function displayContact()
    {
        return array (
            "address" => array (
                "1355 Euclid Ave NE Apt 25-B",
                "Atlanta, GA 30307"
            ),
            "email" => array (
                "dave@daveleach.work"
            ),
            "phone" => array (
                "(678) 849-0054"
            )
        );
    }

    protected function displayParameters()
    {
        return array ();
    }

    protected function displayParametersBase()
    {
        $Parameters = array (
            "bodyclass" => $this->displayTemplate(),
            "copyright" => "2015 Dave Leach",
            "favicon" => "oglethorpe-d.ico",
            "navMenu" => $this->calcNavMenu(),
            "title" => "Dave Leach"
        );

        return array_merge (
            $Parameters,
            $this->displayContact(),
            $this->displaySocial()
        );
    }
    protected function displaySocial()
    {
        return array (
            "social" => array (
                "Github" => array (
                    "icon" => "github",
                    "link" => "https://github.com/dmleach"
                ),
                "LinkedIn" => array (
                    "icon" => "linkedin",
                    "link" => "https://www.linkedin.com/in/dmleach"
                )
            )
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
