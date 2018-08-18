<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Car;
use AppBundle\Entity\CarModel;
use AppBundle\Form\CarType;
use AppBundle\Manager\CarManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Car controller.
 *
 * @Route("admin/car")
 */
class CarController extends Controller
{
    /** @var CarManager */
    private $carManager;

    public function __construct(CarManager $carManager)
    {
        $this->carManager = $carManager;
    }

    /**
     * @Route("/{id}", name="admin_view_car", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $car = $this->carManager->get($id);

        return $this->render('admin/car/detail.html.twig', [
            "car" => $car
        ]);
    }

    /**
     * @Route("/", name="admin_cars")
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $cars = $this->carManager->getList();

        $models = new CarModel();

        return $this->render('admin/car/list.html.twig', [
            "cars" => $cars,
            "models" => $models
        ]);
    }

    /**
     * @Route("/add", name="admin_add_car")
     * @return Response
     * @param Request $request
     */
    public function addAction(Request $request): Response
    {
        $car = new Car();

        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->carManager->save($car);

            return $this->redirectToRoute('admin_cars');
        }

        return $this->render('admin/car/add.html.twig', [
            "form" => $form->createView(),
            "car" => $car
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_edit_car", requirements={"id"="\d+"})
     */
    public function editAction(int $id, Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $car = $em->getRepository(Car::class)
            ->find($id);
        //$car->setImage(null);
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $car = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($car);
            $em->flush();
            return $this->redirectToRoute('admin_view_car', [
                "id"=>$car->getId(),
            ]);
        }

        return $this->render('admin/car/edit.html.twig', [
            'form' => $form->createView(),
            'car' => $car
        ]);
    }

    /**
     * @Route("/{id}/delete", name="admin_delete_car", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(Car $car): Response
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($car);
        $em->flush();

        return $this->redirectToRoute('admin_cars');
    }
}
