<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Car;
use AppBundle\Entity\Model;
use Doctrine\Common\Persistence\ObjectManager;

class CarFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        for ($c = 1; $c <= self::NB_CAR; $c++) {
                $model = new Model();
                $model
                    ->setNameModel('Modele ' . $c)
                    ->setBrand('Marque ' . $c)
                    ->setGamme('Gamme ' . $c)
                    ->setAutonomie('500 km');
                //$this->setReference('car-model-' . $m, $model);
                //$this->setReference("model-" . $m, $model);

                $manager->persist($model);
                //$this->setReference("model-".$c."-".$m, $model);

            $car = new Car();
            $car
                ->setMatriculation('Immat ' . $c)
                ->setKilometers(10000)
                ->setSerialNumber('A465500')
                ->setColor('Couleur ' . $c)
                ->setModel($model);

            //$this->setReference('model' . $m . '-' . $c, $car);
            $manager->persist($car);
        }
        $manager->flush();
    }
}
