<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Model;
use AppBundle\Repository\ModelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ModelManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var ModelRepository */
    private $modelRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->modelRepository = $this->entityManager->getRepository(Model::class);
    }

    public function getList(): array
    {
        return $this->modelRepository->findAll();
    }

    public function get(int $id): Model
    {
        /** @var $model Model */
        $model = $this->modelRepository->find($id);
        $this->checkModel($model);

        return $model;
    }

    public function save(Model $model)
    {
        $this->entityManager->persist($model);
        $this->entityManager->flush();
    }

    public function remove(?Model $model)
    {
        if(!$model) {
            return;
        }

        $this->entityManager->remove($model);
        $this->entityManager->flush();
    }

    private function checkModel(?Model $model)
    {
        if (!$model) {
            throw new NotFoundHttpException('Model not found.');
        }
    }
}
