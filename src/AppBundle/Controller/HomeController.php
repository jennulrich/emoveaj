<?php
/**
 * Created by PhpStorm.
 * User: amandine
 * Date: 06/07/2018
 * Time: 12:09
 */

namespace AppBundle\Controller;

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