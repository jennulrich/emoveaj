<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Car;
use AppBundle\Entity\CarModel;
use AppBundle\Form\CarType;
use AppBundle\Manager\CarManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use AppBundle\Service\ImageUploader;

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
    public function addAction(Request $request, ImageUploader $imageUploader): Response
    {
        $car = new Car();

        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $image */
            $image = $car->getImage();

            $imageName = $this->generateUniqueFileName().'.'.$image->guessExtension();

            $image->move(
                $this->getParameter('images_directory'),
                $imageName
            );

            //$car->setImage(new File($this->getParameter('images_directory').'/'.$car->getImage()));
            $car->setImage($imageName);

            $this->carManager->save($car);

            return $this->redirectToRoute('admin_cars');
        }

        return $this->render('admin/car/add.html.twig', [
            "form" => $form->createView(),
            "car" => $car
        ]);
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }

    /**
     * @Route("/{id}/edit", name="admin_edit_car", requirements={"id"="\d+"})
     * @param $id int
     * @param Request $request
     * @return Response
     */
    public function editAction(int $id, Request $request)
    {
        $car = $this->carManager->get($id);

        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $this->carManager->save($car);

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
