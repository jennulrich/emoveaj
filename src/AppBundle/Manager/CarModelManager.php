<?php

namespace AppBundle\Manager;

use AppBundle\Entity\CarModel;
use AppBundle\Repository\CarModelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CarModelManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var CarModelRepository */
    private $carModelRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->carModelRepository = $this->entityManager->getRepository(CarModel::class);
    }

    public function getList(): array
    {
        return $this->carModelRepository->findAll();
    }

    public function get(int $id): CarModel
    {
        /** @var $carModel CarModel */
        $carModel = $this->carModelRepository->find($id);
        $this->checkCarModel($carModel);

        return $carModel;
    }

    public function save(CarModel $carModel)
    {
        $this->entityManager->persist($carModel);
        $this->entityManager->flush();
    }

    public function remove(?CarModel $carModel)
    {
        if(!$carModel) {
            return;
        }

        $this->entityManager->remove($carModel);
        $this->entityManager->flush();
    }

    private function checkCarModel(?CarModel $carModel)
    {
        if (!$carModel) {
            throw new NotFoundHttpException('Model not found.');
        }
    }
}
