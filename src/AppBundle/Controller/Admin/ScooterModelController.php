<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\ScooterModel;
use AppBundle\Form\ScooterModelType;
use AppBundle\Manager\ScooterModelManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * ScooterModel controller.
 *
 * @Route("admin/scooter-model")
 */
class ScooterModelController extends Controller
{
    /** @var ScooterModelManager */
    private $modelManager;

    public function __construct(ScooterModelManager $modelManager)
    {
        $this->modelManager = $modelManager;
    }

    /**
     * @Route("/{id}", name="admin_view_scooter_model", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $model = $this->modelManager->get($id);

        return $this->render('admin/scooterModel/detail.html.twig', [
            "model" => $model
        ]);
    }

    /**
     * @Route("/", name="admin_scooter_models")
     * @return Response
     */
    public function listAction(): Response
    {
        $models = $this->modelManager->getList();

        return $this->render('admin/scooterModel/list.html.twig', [
            "models" => $models
        ]);
    }

    /**
     * @Route("/add", name="admin_add_scooter_model")
     * @return Response
     * @param Request $request
     */
    public function addAction(Request $request): Response
    {
        $scooterModel = new ScooterModel();

        $form = $this->createForm(ScooterModelType::class, $scooterModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->modelManager->save($scooterModel);

            return $this->redirectToRoute('admin_scooter_models');
        }

        return $this->render('admin/scooterModel/add.html.twig', [
            "form" => $form->createView(),
            "scooterModel" => $scooterModel
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_edit_scooter_model", requirements={"id"="\d+"})
     * @param $id int
     * @param Request $request
     * @return Response
     */
    public function editAction(int $id, Request $request): Response
    {
        $scooterModel = $this->modelManager->get($id);

        $form = $this->createForm(ScooterModelType::class, $scooterModel);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->modelManager->save($scooterModel);

            return $this->redirectToRoute('admin_view_scooter_model', [
                "id"=>$scooterModel->getId(),
            ]);
        }

        return $this->render('admin/scooterModel/edit.html.twig', [
            'form' => $form->createView(),
            'model' => $scooterModel
        ]);
    }

    /**
     * @Route("/{id}/delete", name="admin_delete_scooter_model", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(ScooterModel $scooterModel): Response
    {
        $this->modelManager->remove($scooterModel);

        return $this->redirectToRoute('admin_scooter_models');
    }
}
