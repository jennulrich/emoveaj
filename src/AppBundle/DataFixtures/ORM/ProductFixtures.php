<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Product;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {

        for ($i = 1; $i <=25; $i++) {
            $product = new Product();
            $product->setLabel('Product - ' . $i)
                ->setReference('0001 - ' . $i)
                ->setDescription($this->faker->paragraph(4))
                ->setPublishedAt(new \DateTime());

            $manager->persist($product);
        }
        $manager->flush();
    }
}
