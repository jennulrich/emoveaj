<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 1; $i <=5; $i++) {
            $product = new Product();
            $product->setLabel('Product - ' . $i)
                ->setReference('0001 - ' . $i)
                ->setDescription('Description - ' . $i)
                ->setPublishedAt(new \DateTime());

            $manager->persist($product);
        }
        $manager->flush();
    }
}
