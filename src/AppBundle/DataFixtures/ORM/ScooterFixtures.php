<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Model;
use AppBundle\Entity\Scooter;
use Doctrine\Common\Persistence\ObjectManager;

class ScooterFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        for ($s = 1; $s <= self::NB_SCOOTER; $s++) {
            $model = new Model();
            $model
                ->setNameModel('Modele ' . $s)
                ->setBrand('Marque ' . $s)
                ->setGamme('Gamme ' . $s)
                ->setAutonomie('500 km');
            //$this->setReference('car-model-' . $m, $model);
            //$this->setReference("model-" . $m, $model);

            $manager->persist($model);
            //$this->setReference("model-".$c."-".$m, $model);

            $scooter = new Scooter();
            $scooter
                ->setMatriculation('Immat ' . $s)
                ->setKilometers(10000)
                ->setSerialNumber('A465500')
                ->setColor('Couleur ' . $s)
                ->setModel($model);

            //$this->setReference('model' . $m . '-' . $c, $car);
            $manager->persist($scooter);
        }
        $manager->flush();
    }
}
