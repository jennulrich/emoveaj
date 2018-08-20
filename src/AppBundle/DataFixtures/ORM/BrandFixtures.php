<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Brand;
use Doctrine\Common\Persistence\ObjectManager;

class BrandFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        $brands = [ "Audi", "BMW", "Citroën", "Chevrolet", "Fiat", "Ford", "Kia",
        "Mercedes", "Mitsubishi", "Nissan", "Opel", "Peugeot", "Renault",
        "Seat", "Smart", "Toyota", "Volkswagen" ];

        $i = 1;

        foreach ($brands as $brand) {
            $brandInfo = new Brand();

            $brandInfo
                ->setName($brand);

            $manager->persist($brandInfo);
            $this->setReference("brand-carModel-" . $i, $brandInfo);
            $this->setReference("brand-scooterModel-" . $i, $brandInfo);
            $i++;

        }
        $manager->flush();
    }
}
