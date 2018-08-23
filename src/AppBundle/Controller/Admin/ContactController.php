<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use AppBundle\Manager\ContactManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Contact controller.
 *
 * @Route("admin/contact")
 */
class ContactController extends Controller
{
    /** @var ContactManager */
    private $contactManager;

    public function __construct(ContactManager $contactManager)
    {
        $this->contactManager = $contactManager;
    }

    /**
     * @Route("/{id}", name="admin_view_contact", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $contact = $this->contactManager->get($id);

        return $this->render('admin/contact/detail.html.twig', [
            "contact" => $contact
        ]);
    }

    /**
     * @Route("/", name="admin_contact")
     * @return Response
     */
    public function listAction(): Response
    {
        $contacts = $this->contactManager->getList();

        return $this->render('admin/contact/list.html.twig', [
            "contacts" => $contacts
        ]);
    }


    /**
     * @Route("/{id}/delete", name="admin_delete_contact", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(Contact $contact): Response
    {
        $this->contactManager->remove($contact);

        return $this->redirectToRoute('admin_contact');
    }
}
