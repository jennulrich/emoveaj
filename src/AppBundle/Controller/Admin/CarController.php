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
            //$imageName = $imageUploader->upload($image);

            $image->move(
                $this->getParameter('images_directory'),
                $imageName
            );

            //$car->setImage(new File($this->getParameter('images_directory').'/'.$car->getImage()));
            $car->setImage($imageName);


            /** @var UploadedFile $image2 */
            $image2 = $car->getImage2();

            $imageName2 = $this->generateUniqueFileName().'.'.$image2->guessExtension();
            //$imageName = $imageUploader->upload($image);

            $image2->move(
                $this->getParameter('images_directory'),
                $imageName2
            );

            //$car->setImage(new File($this->getParameter('images_directory').'/'.$car->getImage()));
            $car->setImage2($imageName2);


            /** @var UploadedFile $image3 */
            $image3 = $car->getImage3();

            $imageName3 = $this->generateUniqueFileName().'.'.$image3->guessExtension();
            //$imageName = $imageUploader->upload($image);

            $image3->move(
                $this->getParameter('images_directory'),
                $imageName3
            );

            //$car->setImage(new File($this->getParameter('images_directory').'/'.$car->getImage()));
            $car->setImage3($imageName3);


            /** @var UploadedFile $image4 */
            $image4 = $car->getImage4();

            $imageName4 = $this->generateUniqueFileName().'.'.$image4->guessExtension();
            //$imageName = $imageUploader->upload($image);

            $image4->move(
                $this->getParameter('images_directory'),
                $imageName4
            );

            //$car->setImage(new File($this->getParameter('images_directory').'/'.$car->getImage()));
            $car->setImage4($imageName4);

            
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
