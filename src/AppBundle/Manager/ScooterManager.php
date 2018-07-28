<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Scooter;
use AppBundle\Repository\ScooterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ScooterManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var ScooterRepository */
    private $scooterRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->scooterRepository = $this->entityManager->getRepository(Scooter::class);
    }

    public function getList(): array
    {
        return $this->scooterRepository->findAll();
    }

    public function get(int $id): Scooter
    {
        /** @var $scooter Scooter */
        $scooter = $this->scooterRepository->find($id);
        $this->checkScooter($scooter);

        return $scooter;
    }

    public function save(Scooter $scooter)
    {
        $this->entityManager->persist($scooter);
        $this->entityManager->flush();
    }

    public function remove(?Scooter $scooter)
    {
        if(!$scooter) {
            return;
        }

        $this->entityManager->remove($scooter);
        $this->entityManager->flush();
    }

    private function checkScooter(?Scooter $scooter)
    {
        if (!$scooter) {
            throw new NotFoundHttpException('Scooter not found.');
        }
    }
}
