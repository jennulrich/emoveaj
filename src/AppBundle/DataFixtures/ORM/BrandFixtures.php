<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Brand;
use Doctrine\Common\Persistence\ObjectManager;

class BrandFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        $brands = [
            [
                "name" => "Audi",
                "image" => "audi-logo.png"
            ],
            [
                "name" => "BMW",
                "image" => "BMW-logo.png"
            ],
            [
                "name" => "Chevrolet",
                "image" => "chevrolet-logo.png"
            ],
            [
                "name" => "Citroën",
                "image" => "citroen-logo.png"
            ],
            [
                "name" => "Fiat",
                "image" => "fiat-logo.png"
            ],
            [
                "name" => "Ford",
                "image" => "ford-logo.png"
            ],
            [
                "name" => "Kia",
                "image" => "kia-logo.png"
            ],
            [
                "name" => "Mercedes",
                "image" => "mercedes-logo.png"
            ],
            [
                "name" => "Mitsubishi",
                "image" => "mitsubishi-logo.png"
            ],
            [
                "name" => "Nissan",
                "image" => "nissan-logo.png"
            ],
            [
                "name" => "Opel",
                "image" => "opel-logo.png"
            ],
            [
                "name" => "Peugeot",
                "image" => "peugeot-logo.png"
            ],
            [
                "name" => "Renault",
                "image" => "renault-logo.png"
            ],
            [
                "name" => "Seat",
                "image" => "seat-logo.png"
            ],
            [
                "name" => "Smart",
                "image" => "smart-logo.png"
            ],
            [
                "name" => "Toyota",
                "image" => "toyota-logo.png"
            ],
            [
                "name" => "Volkswagen",
                "image" => "volkswagen-logo.png"
            ]
        ];

        $i = 1;

        foreach ($brands as $brand) {
            $brandInfo = new Brand();

            $brandInfo->setName($brand['name']);
            $brandInfo->setImage($brand['image']);


            $manager->persist($brandInfo);
            $this->setReference("brand-carModel-" . $i, $brandInfo);
            $this->setReference("brand-scooterModel-" . $i, $brandInfo);
            $i++;

        }
        $manager->flush();
    }
}
