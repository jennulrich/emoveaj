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
            ->setAddress('456 Avenue de la République, 75015 Paris')
            ->setBirthDate(new \DateTime('20-11-1986'))
            ->setDriveLicenceNb('A465500')
            ->setPassword('admin');

        $manager->persist($user);

        $manager->flush();
    }

    private function loadUsers(ObjectManager $manager)
    {
        for ($u = 1; $u <= self::NB_USER; $u++) {
            $user = new User();
            $user->setLastName('Doe')
                ->setFirstName('John')
                ->setMail($this->faker->email)
                ->setAddress('456 Avenue de la République, 75015 Paris')
                ->setPhoneNumber(06)
                ->setBirthDate(new \DateTime('20-11-1986'))
                ->setDriveLicenceNb('A465500')
                ->setIsAdmin(false)
                ->setPassword('test');

            $manager->persist($user);
        }
        $manager->flush();
    }
}
