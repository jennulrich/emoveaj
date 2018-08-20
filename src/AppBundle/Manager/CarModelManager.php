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
    private $modelRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->modelRepository = $this->entityManager->getRepository(CarModel::class);
    }

    public function getList(): array
    {
        return $this->modelRepository->findAll();
    }

    public function get(int $id): CarModel
    {
        /** @var $model CarModel */
        $model = $this->modelRepository->find($id);
        $this->checkCarModel($model);

        return $model;
    }

    public function save(CarModel $model)
    {
        $this->entityManager->persist($model);
        $this->entityManager->flush();
    }

    public function remove(?CarModel $model)
    {
        if(!$model) {
            return;
        }

        $this->entityManager->remove($model);
        $this->entityManager->flush();
    }

    private function checkCarModel(?CarModel $model)
    {
        if (!$model) {
            throw new NotFoundHttpException('Model not found.');
        }
    }
}
