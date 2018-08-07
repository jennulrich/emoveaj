<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Brand;
use AppBundle\Repository\BrandRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BrandManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var BrandRepository */
    private $brandRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->brandRepository = $this->entityManager->getRepository(Brand::class);
    }

    public function getList(): array
    {
        return $this->brandRepository->findAll();
    }

    public function get(int $id): Brand
    {
        /** @var $brand Brand */
        $brand = $this->brandRepository->find($id);
        $this->checkBrand($brand);

        return $brand;
    }

    public function save(Brand $brand)
    {
        $this->entityManager->persist($brand);
        $this->entityManager->flush();
    }

    public function remove(?Brand $brand)
    {
        if(!$brand) {
            return;
        }

        $this->entityManager->remove($brand);
        $this->entityManager->flush();
    }

    private function checkBrand(?Brand $brand)
    {
        if (!$brand) {
            throw new NotFoundHttpException('Brand not found.');
        }
    }
}
