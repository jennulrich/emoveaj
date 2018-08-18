<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Scooter;
use AppBundle\Form\ScooterType;
use AppBundle\Manager\ScooterManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Scooter controller.
 *
 * @Route("admin/scooter")
 */
class ScooterController extends Controller
{
    /** @var ScooterManager */
    private $scooterManager;

    public function __construct(ScooterManager $scooterManager)
    {
        $this->scooterManager = $scooterManager;
    }

    /**
     * @Route("/{id}", name="admin_view_scooter", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $scooter = $this->scooterManager->get($id);

        return $this->render('admin/scooter/detail.html.twig', [
            "scooter" => $scooter
        ]);
    }

    /**
     * @Route("/", name="admin_scooters")
     * @return Response
     */
    public function listAction(): Response
    {
        $scooters = $this->scooterManager->getList();

        return $this->render('admin/scooter/list.html.twig', [
            "scooters" => $scooters
        ]);
    }

    /**
     * @Route("/add", name="admin_add_scooter")
     * @Method({"GET", "POST"})
     * @return Response
     * @param Request $request
     */
    public function addAction(Request $request): Response
    {
        $scooter = new Scooter();

        $form = $this->createForm(ScooterType::class, $scooter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->scooterManager->save($scooter);

            return $this->redirectToRoute('admin_scooters');
        }

        return $this->render('admin/scooter/add.html.twig', [
            "form" => $form->createView(),
            "scooter" => $scooter
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_edit_scooter", requirements={"id"="\d+"})
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function editAction(int $id, Request $request)
    {
        $scooter = $this->scooterManager->get($id);
        //$scooter->setImage(null);
        $form = $this->createForm(ScooterType::class, $scooter);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $this->scooterManager->save($scooter);

            return $this->redirectToRoute('admin_view_scooter', [
                "id"=>$scooter->getId(),
            ]);
        }

        return $this->render('admin/scooter/edit.html.twig', [
            'form' => $form->createView(),
            'scooter' => $scooter
        ]);
    }

    /**
     * @Route("/{id}/delete", name="admin_delete_scooter", requirements={"id"="\d+"})
     * @Method({"GET", "POST"})
     * @return Response
     */
    public function DeleteAction(Scooter $scooter): Response
    {
        $this->scooterManager->remove($scooter);

        return $this->redirectToRoute('admin_scooters');
    }
}
