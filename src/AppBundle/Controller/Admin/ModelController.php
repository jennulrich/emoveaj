<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\CarModel;
use AppBundle\Form\ModelType;
use AppBundle\Manager\ModelManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Model controller.
 *
 * @Route("admin/model")
 */
class ModelController extends Controller
{
    /** @var ModelManager */
    private $modelManager;

    public function __construct(ModelManager $modelManager)
    {
        $this->modelManager = $modelManager;
    }

    /**
     * @Route("/{id}", name="admin_view_model", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $model = $this->modelManager->get($id);

        return $this->render('admin/model/detail.html.twig', [
            "model" => $model
        ]);
    }

    /**
     * @Route("/", name="admin_models")
     * @return Response
     */
    public function listAction(): Response
    {
        $models = $this->modelManager->getList();

        return $this->render('admin/model/list.html.twig', [
            "models" => $models
        ]);
    }

    /**
     * @Route("/add", name="admin_add_model")
     * @return Response
     * @param Request $request
     */
    public function addAction(Request $request): Response
    {
        $model = new CarModel();

        $form = $this->createForm(ModelType::class, $model);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->modelManager->save($model);

            return $this->redirectToRoute('admin_models');
        }

        return $this->render('admin/model/add.html.twig', [
            "form" => $form->createView(),
            "model" => $model
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_edit_model", requirements={"id"="\d+"})
     * @param $id int
     * @param Request $request
     * @return Response
     */
    public function editAction(int $id, Request $request): Response
    {
        $model = $this->modelManager->get($id);

        $form = $this->createForm(ModelType::class, $model);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->modelManager->save($model);

            return $this->redirectToRoute('admin_view_model', [
                "id"=>$model->getId(),
            ]);
        }

        return $this->render('admin/model/edit.html.twig', [
            'form' => $form->createView(),
            'model' => $model
        ]);
    }

    /**
     * @Route("/{id}/delete", name="admin_delete_model", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(CarModel $model): Response
    {
        $this->modelManager->remove($model);

        return $this->redirectToRoute('admin_models');
    }
}
