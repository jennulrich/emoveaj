<?php

namespace AppBundle\Controller\Front;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Home controller.
 *
 * @Route("front")
 */
class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function HomeAction()
    {
        return $this->render('front/home.html.twig');
    }
}