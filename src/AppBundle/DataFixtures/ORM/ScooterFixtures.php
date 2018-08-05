<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Scooter;
use Doctrine\Common\Persistence\ObjectManager;

class ScooterFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        for ($s = 1; $s <= self::NB_SCOOTER; $s++) {
            $scooter = new Scooter();
            $scooter->setModel('Modele '. $s)
                ->setMatriculation('Immat ' . $s)
                ->setKilometers(10000)
                ->setSerialNumber('A465500')
                ->setColor('Couleur ' . $s);

            $manager->persist($scooter);
        }
        $manager->flush();
    }
}
