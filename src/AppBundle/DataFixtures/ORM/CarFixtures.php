<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Car;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CarFixtures extends FixtureHelper implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // 5 modèles en base
        for ($i=1; $i<=5; $i++) {
            $model = $this->getReference("car-model-".$i);
            // 10 voitures du même modèle
            for ($j=1; $j<=self::NB_CAR; $j++) {
                $car = new Car();
                $car->setModel($model);
                $car->setMatriculation('A465500');
                $car->setColor('Couleur');
                $car->setKilometers($this->faker->numberBetween(2000, 15000));
                $car->setReference('REFCAR-000' . $this->faker->numberBetween(100, 500));
                $car->setSerialNumber($this->faker->numberBetween(3100057, 21090057));

                $manager->persist($car);
                $this->setReference("voiture-".$i."-".$j, $car);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CarModelFixtures::class,
        );
    }
}
