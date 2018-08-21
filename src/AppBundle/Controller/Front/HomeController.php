<?php

namespace AppBundle\Controller\Front;

use AppBundle\Manager\CarModelManager;
use AppBundle\Manager\BrandManager;
use AppBundle\Manager\CarManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Home controller.
 *
 * @Route("front")
 */
class HomeController extends Controller
{
    /** @var CarModelManager */
    private $modelManager;

    /** @var CarManager */
    private $carManager;

    /** @var BrandManager */
    private $brandManager;

    public function __construct(CarModelManager $modelManager, CarManager $carManager,
                                BrandManager $brandManager)
    {
        $this->modelManager = $modelManager;
        $this->carManager = $carManager;
        $this->brandManager = $brandManager;
    }

    /**
     * @Route("/home", name="home")
     */
    public function HomeAction()
    {
        $models = $this->modelManager->getList();
        $cars = $this->carManager->getList();
        $brands = $this->brandManager->getList();
        return $this->render('front/home/home.html.twig', [
            "models" => $models,
            "cars" => $cars,
            "brands" => $brands
        ]);
    }
}
