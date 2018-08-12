<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\ScooterModel;
use Doctrine\Common\Persistence\ObjectManager;

class ScooterModelFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        $models = [
            [
                "name_model" => "E-Tron",
                "gamme" => "SUV",
                "autonomie" => "500"
            ],
            [
                "name_model" => "Active E",
                "gamme" => "Coupé",
                "autonomie" => "160"
            ],
            [
                "name_model" => "C-Zero",
                "gamme" => "Citadine",
                "autonomie" => "150"
            ],
            [
                "name_model" => "Bolt",
                "gamme" => "Berline",
                "autonomie" => "520"
            ],
            [
                "name_model" => "Fiat 500 E",
                "gamme" => "Citadine",
                "autonomie" => "162"
            ]
        ];

        $i = 1;

        foreach ($models as $model) {
            $scooterModel = new ScooterModel();
            $scooterModel
                ->setNameModel($model['name_model'])
                ->setGamme($model['gamme'])
                ->setAutonomie($model['autonomie']);

            $manager->persist($scooterModel);
            $this->setReference("scooter-model-".$i, $scooterModel);
            $i++;
        }
        $manager->flush();
    }
}
