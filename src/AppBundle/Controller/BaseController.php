<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    protected function calcNavMenu()
    {
        $NavMenu = array (
            array (
                "Caption" => "Home",
                "Route" => "home"
            ),
            array (
                "Caption" => "Resume",
                "Route" => "resume"
            ),
            array (
                "Caption" => "Contact",
                "Route" => "message"
            ),
        );

        return array_merge($NavMenu, $this->displayAdditionalNav());
    }

    protected function displayAdditionalNav()
    {
        return array ();
    }

    protected function displayBodyClass()
    {
        return "no-sidebar";
    }

    protected function displayAbout()
    {
        return array (
            "header" => "About me",
            "text" => array (
                "I've been developing software professionally since the
                summer of 1996, primarily using Delphi. In the past few years
                I've begun transitioning into creating software for the web
                using PHP.",
                "When I'm not programming you'll find me playing European-style
                strategy board games or brushing up on my photography and
                cooking. I write about my hobbies, including my experience being
                a contestant on Jeopardy!, on my personal website: dmleach.com"
            )
        );
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
            "about" => $this->displayAbout(),
            "bodyclass" => $this->displayBodyClass(),
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
