<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        $this->loadAdmin($manager);
        $this->loadUsers($manager);
    }

    private function loadAdmin(ObjectManager $manager)
    {
        $user = new User();
        $user->setMail('admin@test.fr')
            ->setPhoneNumber($this->faker->phoneNumber)
            ->setFirstName($this->faker->firstName())
            ->setLastName($this->faker->lastName)
            ->setIsAdmin(true)
            ->setAddress($this->faker->address)
            ->setBirthDate($this->faker->dateTime())
            ->setDriveLicenceNb('A465500')
            ->setPassword('$2y$10$wqXzPnaqQ81BNnOhZjZKFe53RGTbEXZH9ztybr4shr3B1mnHvHQvq');

        $manager->persist($user);

        $manager->flush();
    }

    private function loadUsers(ObjectManager $manager)
    {
        for ($u = 1; $u <= self::NB_USER; $u++) {
            $user = new User();
            $user->setLastName($this->faker->lastName)
                ->setFirstName($this->faker->firstName())
                ->setMail($this->faker->email)
                ->setAddress($this->faker->address)
                ->setPhoneNumber($this->faker->phoneNumber)
                ->setBirthDate($this->faker->dateTime())
                ->setDriveLicenceNb('A465500')
                ->setIsAdmin(false)
                ->setPassword('test');

            $manager->persist($user);
        }
        $manager->flush();
    }
}
