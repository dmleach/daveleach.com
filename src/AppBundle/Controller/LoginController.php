<?php

namespace AppBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;

class LoginController extends BaseController
{
    public function actionCheck() {}

    protected function displayParameters()
    {
        $Request = $this->getRequest();
        $Session = $Request->getSession();

        /* Check to see if there are any current login errors */
        if ($Request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $Error = $Request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $Error = $Session->get(SecurityContext::AUTHENTICATION_ERROR);
            $Session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array (
            "error"         => $Error,
            "last_username" => $Session->get(SecurityContext::LAST_USERNAME),
        );
    }

    protected function displayTemplate()
    {
        return 'login.html.twig';
    }
}

?>
