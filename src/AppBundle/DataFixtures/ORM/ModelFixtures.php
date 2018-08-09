<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Car;
use AppBundle\Entity\Model;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ModelFixtures extends FixtureHelper
{
    /*public function load(ObjectManager $manager)
    {
            for ($m = 1; $m <= self::NB_MODEL; $m++) {
                $model = new Model();
                $model
                    ->setNameModel('Modele ' . $m)
                    ->setBrand('Marque ' . $m)
                    ->setGamme('Gamme ' . $m)
                    ->setAutonomie('500 km');
                //$this->setReference('car-model-' . $m, $model);
                $this->setReference($m, $model);

                $manager->persist($model);
                //$this->setReference("model-".$c."-".$m, $model);
            }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CarFixtures::class,
        );
    }*/
}
