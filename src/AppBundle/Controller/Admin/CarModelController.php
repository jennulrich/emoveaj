<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\CarModel;
use AppBundle\Form\CarModelType;
use AppBundle\Manager\ModelManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * CarModel controller.
 *
 * @Route("admin/car-model")
 */
class CarModelController extends Controller
{
    /** @var ModelManager */
    private $modelManager;

    public function __construct(ModelManager $modelManager)
    {
        $this->modelManager = $modelManager;
    }

    /**
     * @Route("/{id}", name="admin_view_car_model", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $model = $this->modelManager->get($id);

        return $this->render('admin/carModel/detail.html.twig', [
            "model" => $model
        ]);
    }

    /**
     * @Route("/", name="admin_car_models")
     * @return Response
     */
    public function listAction(): Response
    {
        $models = $this->modelManager->getList();

        return $this->render('admin/carModel/list.html.twig', [
            "models" => $models
        ]);
    }

    /**
     * @Route("/add", name="admin_add_car_model")
     * @return Response
     * @param Request $request
     */
    public function addAction(Request $request): Response
    {
        $model = new CarModel();

        $form = $this->createForm(CarModelType::class, $model);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->modelManager->save($model);

            return $this->redirectToRoute('admin_car_models');
        }

        return $this->render('admin/carModel/add.html.twig', [
            "form" => $form->createView(),
            "model" => $model
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_edit_car_model", requirements={"id"="\d+"})
     */
    public function editAction(int $id, Request $request)
    {
        $model = $this->modelManager->get($id);

        $form = $this->createForm(CarModelType::class, $model);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->modelManager->save($model);

            return $this->redirectToRoute('admin_view_car_model', [
                "id"=>$model->getId(),
            ]);
        }

        return $this->render('admin/carModel/edit.html.twig', [
            'form' => $form->createView(),
            'model' => $model
        ]);
    }

    /**
     * @Route("/{id}/delete", name="admin_delete_car_model", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(CarModel $model): Response
    {
        $this->modelManager->remove($model);

        return $this->redirectToRoute('admin_car_models');
    }
}
