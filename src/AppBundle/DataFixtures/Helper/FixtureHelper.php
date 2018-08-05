<?php

namespace AppBundle\DataFixtures\Helper;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;

class FixtureHelper extends Fixture
{
    const NB_CAR = 20;
    const NB_SCOOTER = 20;

    /**
     * @var \Faker\Generator
     */
    public $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
    }
}