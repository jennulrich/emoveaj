<?php

namespace AppBundle\Controller;

use AppBundle\Manager\OrderManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Order controller.
 *
 * @Route("order")
 */
class OrderController extends Controller
{
    /** @var OrderManager */
    private $orderManager;

    public function __construct(OrderManager $orderManager)
    {
        $this->orderManager = $orderManager;
    }

    /**
     * Lists all order entities.
     *
     * @Route("/", name="order_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $orders = $this->orderManager->getList();

        return $this->render('admin/order/index.html.twig', array(
            'orders' => $orders,
        ));
    }

    /**
     * Finds and displays a order entity.
     *
     * @Route("/{id}", name="order_show")
     * @Method("GET")
     */
    public function showAction(int $id)
    {
        $order = $this->orderManager->get($id);

        return $this->render('admin/order/show.html.twig', array(
            'order' => $order,
        ));
    }
}
