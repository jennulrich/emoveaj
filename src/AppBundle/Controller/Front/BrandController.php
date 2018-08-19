<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\Brand;
use AppBundle\Form\BrandType;
use AppBundle\Manager\BrandManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Brand controller.
 *
 * @Route("front/brand")
 */
class BrandController extends Controller
{
    /** @var BrandManager */
    private $brandManager;

    public function __construct(BrandManager $brandManager)
    {
        $this->brandManager = $brandManager;
    }

    /**
     * @Route("/{id}", name="front_view_brand", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $brand = $this->brandManager->get($id);

        return $this->render('front/brand/detail.html.twig', [
            "brand" => $brand
        ]);
    }

    /**
     * @Route("/", name="front_brands")
     * @return Response
     */
    public function listAction(): Response
    {
        $brands = $this->brandManager->getList();

        return $this->render('front/brand/list.html.twig', [
            "brands" => $brands
        ]);
    }
}
