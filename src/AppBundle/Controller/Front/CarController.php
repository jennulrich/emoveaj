<?php

namespace AppBundle\Controller\Front;

use AppBundle\Manager\CarManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Car controller.
 *
 * @Route("car")
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
     * @Route("/{id}", name="front_view_car", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $car = $this->carManager->get($id);

        return $this->render('front/car/detail.html.twig', [
            "car" => $car
        ]);
    }

    /**
     * @Route("/", name="front_cars")
     * @return Response
     */
    public function listAction(): Response
    {
        $cars = $this->carManager->getList();

        return $this->render('front/car/list.html.twig', [
            "cars" => $cars
        ]);
    }
}
