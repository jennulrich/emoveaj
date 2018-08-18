<?php

namespace AppBundle\Controller\Admin;

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
 * @Route("admin/brand")
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
     * @Route("/{id}", name="admin_view_brand", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $brand = $this->brandManager->get($id);

        return $this->render('admin/brand/detail.html.twig', [
            "brand" => $brand
        ]);
    }

    /**
     * @Route("/", name="admin_brands")
     * @return Response
     */
    public function listAction(): Response
    {
        $brands = $this->brandManager->getList();

        return $this->render('admin/brand/list.html.twig', [
            "brands" => $brands
        ]);
    }

    /**
     * @Route("/add", name="admin_add_brand")
     * @return Response
     * @param Request $request
     */
    public function addAction(Request $request): Response
    {
        $brand = new Brand();

        $form = $this->createForm(BrandType::class, $brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->brandManager->save($brand);

            return $this->redirectToRoute('admin_brands');
        }

        return $this->render('admin/brand/add.html.twig', [
            "form" => $form->createView(),
            "brand" => $brand
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_edit_brand", requirements={"id"="\d+"})
     * @param $id int
     * @param Request $request
     * @return Response
     */
    public function editAction(int $id, Request $request): Response
    {
        $brand = $this->brandManager->get($id);

        $form = $this->createForm(brandType::class, $brand);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->brandManager->save($brand);

            return $this->redirectToRoute('admin_view_brand', [
                "id"=>$brand->getId(),
            ]);
        }

        return $this->render('admin/brand/edit.html.twig', [
            'form' => $form->createView(),
            'brand' => $brand
        ]);
    }

    /**
     * @Route("/{id}/delete", name="admin_delete_brand", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(Brand $brand): Response
    {
        $this->brandManager->remove($brand);

        return $this->redirectToRoute('admin_brands');
    }
}
