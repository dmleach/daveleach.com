<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends BaseController
{
    public function displayAction(Request $Request = null)
    {
        $Message = new \AppBundle\Entity\Message();
        $Form = $this->createForm("ServiceMessageForm", $Message);

        if ($Request->getMethod() == "POST") {
            $Form->handleRequest($Request);

            if ($Form->isValid()) {
                $this->get("session")->getFlashBag()->add(
                    "notice",
                    "Thanks for contacting me!"
                );
            } else {
                $this->get("session")->getFlashBag()->add(
                    "error",
                    "Invalid information sent to message processor"
                );
            }
        }

        return parent::displayAction();
    }

    public function displayParameters()
    {
        $Message = new \AppBundle\Entity\Message();
        $Form = $this->createForm("ServiceMessageForm", $Message);
        $View = $Form->createView();

        return array (
            "form_view" => $View
        );
    }

    public function displayTemplate()
    {
        return "message.html.twig";
    }
}
