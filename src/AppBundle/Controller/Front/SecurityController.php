<?php

namespace AppBundle\Controller\Front;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login-user", name="user_login")
     */
    public function loginUserAction(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();
        return $this->render('front/security/login.html.twig', [
            'last_username' => $lastUsername ,
            'error' => $error
        ]);
    }

    /**
     * @Route("/logout-user", name="user_logout")
     */
    public function logoutUserAction()
    {

    }
}
