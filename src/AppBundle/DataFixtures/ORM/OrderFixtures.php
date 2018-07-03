<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Order;
use Doctrine\Common\Persistence\ObjectManager;

class OrderFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <=5; $i++) {
            $order = new Order();
            $order->setCreatedAt(new \DateTime())
                ->setComment($this->faker->paragraph(2))
                ->setIsPaid(0)
                ->setStatus(1);

            $manager->persist($order);
        }
        $manager->flush();
    }
}
