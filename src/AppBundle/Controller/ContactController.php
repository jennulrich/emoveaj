<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;

/**
 * Contact controller.
 *
 * @Route("front/contact")
 */
class ContactController extends Controller
{
    /**
     * @Route("/", name="contact")
     * @return Response
     * @Method({"GET","POST"})
     * @param Request $request
     * @param \Swift_Mailer $mailer
     */
    public function indexAction(Request $request, \Swift_Mailer $mailer): Response
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $emailContact = $this->getParameter('mailer_user');
            $message = (new \Swift_Message('Demande de contact'))
                ->setFrom($emailContact)
                ->setTo($emailContact)
                ->setBody(
                    $this->renderView('front/emails/contact.html.twig', [
                        'contact' => $contact
                    ]), 'text/html'
                );
            $mailer->send($message);

            return $this->redirectToRoute('contact');
        }

        return $this->render('front/contact/contact.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
