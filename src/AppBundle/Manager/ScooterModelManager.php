<?php

namespace AppBundle\Manager;

use AppBundle\Entity\ScooterModel;
use AppBundle\Repository\ScooterModelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ScooterModelManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var ScooterModelRepository */
    private $scooterModelRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->scooterModelRepository = $this->entityManager->getRepository(ScooterModel::class);
    }

    public function getList(): array
    {
        return $this->scooterModelRepository->findAll();
    }

    public function get(int $id): ScooterModel
    {
        /** @var $scooterModel ScooterModel */
        $scooterModel = $this->scooterModelRepository->find($id);
        $this->checkScooterModel($scooterModel);

        return $scooterModel;
    }

    public function save(ScooterModel $scooterModel)
    {
        $this->entityManager->persist($scooterModel);
        $this->entityManager->flush();
    }

    public function remove(?ScooterModel $scooterModel)
    {
        if(!$scooterModel) {
            return;
        }

        $this->entityManager->remove($scooterModel);
        $this->entityManager->flush();
    }

    private function checkScooterModel(?ScooterModel $scooterModel)
    {
        if (!$scooterModel) {
            throw new NotFoundHttpException('Model not found.');
        }
    }
}
