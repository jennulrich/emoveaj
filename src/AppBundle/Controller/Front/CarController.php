<?php

namespace AppBundle\Controller\Front;

use AppBundle\Manager\BrandManager;
use AppBundle\Manager\CarManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Car controller.
 *
 * @Route("front/car")
 */
class CarController extends Controller
{
    /** @var CarManager */
    private $carManager;

    /** @var BrandManager */
    private $brandManager;

    public function __construct(CarManager $carManager, BrandManager $brandManager)
    {
        $this->carManager = $carManager;
        $this->brandManager = $brandManager;
    }

    /**
     * @Route("/{id}", name="front_view_car", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $car = $this->carManager->get($id);
        //$brand = $this->brandManager->get($id);

        return $this->render('front/car/detail.html.twig', [
            "car" => $car,
            //"brand" => $brand
        ]);
    }

    /**
     * @Route("/", name="front_cars")
     * @return Response
     */
    public function listAction(): Response
    {
        $cars = $this->carManager->getList();
        $brands = $this->brandManager->getList();

        return $this->render('front/car/list.html.twig', [
            "cars" => $cars,
            "brands" => $brands
        ]);
    }
}
