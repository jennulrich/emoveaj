<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DataFixtures\Helper\FixtureHelper;
use AppBundle\Entity\Category;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends FixtureHelper
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <=2; $i++) {
            $category = new Category();
            $category->setLabel('Category - ' . $i)
                ->setPublishedAt(new \DateTime())
                ->setDescription('Description - ' . $i)
                ->setPosition(1)
                ->setProducts('Produit - ' . $i);

            $manager->persist($category);
        }
        $manager->flush();
    }
}