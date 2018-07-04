<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Repository\OrderRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var OrderRepository */
    private $orderRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->orderRepository = $this->entityManager->getRepository(Order::class);
    }

    public function getList(): array
    {
        return $this->orderRepository->findAll();
    }

    public function get(int $id): Order
    {
        /** @var $order Order*/
        $order = $this->orderRepository->find($id);
        $this->checkOrder($order);

        return $order;
    }

    private function checkOrder(?Order $order): void
    {
        if (!$order) {
            throw new NotFoundHttpException('Order Not Found.');
        }
    }
}
