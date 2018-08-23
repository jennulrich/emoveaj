<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Brand;
use Doctrine\Common\Persistence\ObjectManager;

class BrandFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        $fixturesPath =  "/Applications/MAMP/htdocs/emoveaj/src/AppBundle/DataFixtures";

        $brands = [
            [
                "name" => "Audi",
                "image" => "BMW-logo.png"
            ],
            [
                "name" => "BMW",
                "image" => $fixturesPath."/img/BMW-logo.png"
            ],
            [
                "name" => "Chevrolet",
                "image" => $fixturesPath."/img/chevrolet-logo.png"
            ],
            [
                "name" => "Citroën",
                "image" => $fixturesPath."/img/citroen-logo.png"
            ],
            [
                "name" => "Fiat",
                "image" => $fixturesPath."/img/fiat-logo.png"
            ],
            [
                "name" => "Ford",
                "image" => $fixturesPath."/img/ford-logo.png"
            ],
            [
                "name" => "Kia",
                "image" => $fixturesPath."/img/kia-logo.png"
            ],
            [
                "name" => "Mercedes",
                "image" => $fixturesPath."/img/mercedes-logo.png"
            ],
            [
                "name" => "Mitsubishi",
                "image" => $fixturesPath."/img/mitshubishi-logo.png"
            ],
            [
                "name" => "Nissan",
                "image" => $fixturesPath."/img/nissan-logo.png"
            ],
            [
                "name" => "Opel",
                "image" => $fixturesPath."/img/client-logo/opel-logo.png"
            ],
            [
                "name" => "Peugeot",
                "image" => $fixturesPath."/img/peugeot-logo.png"
            ],
            [
                "name" => "Renault",
                "image" => $fixturesPath."/img/renault-logo.png"
            ],
            [
                "name" => "Seat",
                "image" => $fixturesPath."/img/seat-logo.png"
            ],
            [
                "name" => "Smart",
                "image" => $fixturesPath."/img/smart-logo.png"
            ],
            [
                "name" => "Toyota",
                "image" => $fixturesPath."/img/toyota-logo.png"
            ],
            [
                "name" => "Volkswagen",
                "image" => $fixturesPath."/img/volkswagen-logo.png"
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
