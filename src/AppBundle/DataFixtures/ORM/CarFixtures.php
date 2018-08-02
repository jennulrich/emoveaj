<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Car;
use Doctrine\Common\Persistence\ObjectManager;

class CarFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        for ($c = 1; $c <= self::NB_CAR; $c++) {
            $car = new Car();
            $car->setModel('Modele '. $c)
                ->setMatriculation('Immat ' . $c)
                ->setKilometers(10000)
                ->setSerialNumber('A465500')
                ->setColor('Couleur ' . $c);

            $manager->persist($car);
        }
        $manager->flush();
    }
}