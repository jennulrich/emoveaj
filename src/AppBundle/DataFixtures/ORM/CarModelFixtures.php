<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\CarModel;
use Doctrine\Common\Persistence\ObjectManager;

class CarModelFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        $models = [
            [
                "name_model" => "E-Tron",
                "autonomie" => "500"
            ],
            [
                "name_model" => "Active E",
                "autonomie" => "160"
            ],
            [
                "name_model" => "C-Zero",
                "autonomie" => "150"
            ],
            [
                "name_model" => "Bolt",
                "autonomie" => "520"
            ],
            [
                "name_model" => "Fiat 500 E",
                "autonomie" => "162"
            ]
        ];

        $i = 1;

        foreach ($models as $model) {
            $modelInfo = new CarModel();
            $modelInfo->setNameModel($model['name_model']);
            $modelInfo->setGamme("CITADINE");
            $modelInfo->setBrand($this->getReference("brand-model-" . $i));
            $modelInfo->setAutonomie($model['autonomie']);

            $manager->persist($modelInfo);
            $this->setReference("car-model-".$i, $modelInfo);
            $i++;
        }
        $manager->flush();
    }
}
