<?php

namespace AppBundle\Controller\Front;

use AppBundle\Manager\BrandManager;
use AppBundle\Manager\ScooterManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Scooter controller.
 *
 * @Route("front/scooter")
 */
class ScooterController extends Controller
{
    /** @var ScooterManager */
    private $scooterManager;

    /** @var BrandManager */
    private $brandManager;

    public function __construct(ScooterManager $scooterManager, BrandManager $brandManager)
    {
        $this->scooterManager = $scooterManager;
        $this->brandManager = $brandManager;
    }

    /**
     * @Route("/{id}", name="front_view_scooter", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $scooter = $this->scooterManager->get($id);
        $brand = $this->brandManager->get($id);

        return $this->render('front/scooter/detail.html.twig', [
            "scooter" => $scooter,
            "brand" => $brand
        ]);
    }

    /**
     * @Route("/", name="front_scooters")
     * @return Response
     */
    public function listAction(): Response
    {
        $scooters = $this->scooterManager->getList();
        $brands = $this->brandManager->getList();

        return $this->render('front/scooter/list.html.twig', [
            "scooters" => $scooters,
            "brands" => $brands
        ]);
    }
}
