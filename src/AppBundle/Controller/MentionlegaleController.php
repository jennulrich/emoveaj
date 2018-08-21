<?php
/**
 * Created by PhpStorm.
 * User: amandine
 * Date: 18/08/2018
 * Time: 16:04
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Mention Legale controller.
 *
 * @Route("front/mentionlegale")
 */
class MentionlegaleController extends Controller
{
    /**
     * @Route("/", name="mentionlegale")
     */
    public function MentionlegaleAction()
    {
        return $this->render('front/mentionlegale.html.twig');
    }
}
