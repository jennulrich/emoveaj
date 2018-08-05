<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        for ($u = 1; $u <= self::NB_USER; $u++) {
            $user = new User();
            $user->setLastName('Doe')
                ->setFirstName('John')
                ->setMail('test@test.fr')
                ->setAddress('456 Avenue de la République, 75015 Paris')
                ->setPhoneNumber(06)
                ->setBirthDate(new \DateTime('20-11-1986'))
                ->setDriveLicenceNb('A465500');

            $manager->persist($user);
        }
        $manager->flush();
    }
}
