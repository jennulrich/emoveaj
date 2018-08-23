<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Scooter;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ScooterFixtures extends FixtureHelper implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // 5 modèles en base
        for ($i=1; $i<=5; $i++) {
            $model = $this->getReference("scooter-model-".$i);
            // 10 scooters du même modèle
            for ($j=1; $j<=self::NB_SCOOTER; $j++) {
                $scooter = new Scooter();
                $scooter->setModel($model);
                $scooter->setMatriculation('A465500');
                $scooter->setColor('Couleur');
                $scooter->setKilometers($this->faker->numberBetween(100, 2000));
                $scooter->setReference('REFSCOOT-100' . $this->faker->numberBetween(100, 500));
                $scooter->setSerialNumber($this->faker->numberBetween(3100057, 21090057));
                $scooter->setPrice($this->faker->numberBetween(19, 100));
                $scooter->setImage("test.png");

                $manager->persist($scooter);
                $this->setReference("scooter-".$i."-".$j, $scooter);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ScooterModelFixtures::class,
        );
    }
}
