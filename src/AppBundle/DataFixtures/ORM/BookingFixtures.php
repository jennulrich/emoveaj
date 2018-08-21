<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Booking;
use AppBundle\Entity\Car;
use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BookingFixtures extends FixtureHelper implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

            $car = new Car();
            for ($j=1; $j<=self::NB_BOOKING; $j++) {
                $booking = new Booking();
                $booking->setStartAt($this->faker->dateTime);
                $booking->setEndAt($this->faker->dateTime);
                $booking->setCar($this->getReference('voiture-' . Faker::numberBetween(1, 5)));

                $manager->persist($booking);
                $this->setReference("booking-".$j, $booking);
            }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CarFixtures::class,
        );
    }
}
