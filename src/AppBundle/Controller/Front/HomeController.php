<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Home controller.
 *
 * @Route("front/home")
 */
class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function HomeAction()
    {
        return $this->render('front/home.html.twig');
    }
}