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
 * Contact controller.
 *
 * @Route("front/contact")
 */
class ContactController extends Controller
{
    /**
     * @Route("/", name="contact")
     */
    public function ContactAction()
    {
        return $this->render('front/contact.html.twig');
    }
}