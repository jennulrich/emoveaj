<?php
/**
 * Created by PhpStorm.
 * User: amandine
 * Date: 18/08/2018
 * Time: 17:55
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * About Us controller.
 *
 * @Route("front/aboutus")
 */
class AboutusController extends Controller
{
    /**
     * @Route("/", name="aboutus")
     */
    public function AboutusAction()
    {
        return $this->render('front/about/aboutus.html.twig');
    }
}
