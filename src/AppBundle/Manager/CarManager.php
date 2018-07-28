<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Car;
use AppBundle\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CarManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var CarRepository */
    private $carRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->carRepository = $this->entityManager->getRepository(Car::class);
    }

    public function getList(): array
    {
        return $this->carRepository->findAll();
    }

    public function get(int $id): Car
    {
        /** @var $car Car */
        $car = $this->carRepository->find($id);
        $this->checkCar($car);

        return $car;
    }

    public function save(Car $car)
    {
        $this->entityManager->persist($car);
        $this->entityManager->flush();
    }

    public function remove(?Car $car)
    {
        if(!$car) {
            return;
        }

        $this->entityManager->remove($car);
        $this->entityManager->flush();
    }

    private function checkCar(?Car $car)
    {
        if (!$car) {
            throw new NotFoundHttpException('Car not found.');
        }
    }
}
