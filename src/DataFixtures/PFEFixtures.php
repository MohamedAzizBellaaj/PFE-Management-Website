<?php

namespace App\DataFixtures;

use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PFEFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $PFE = new PFE();
            $PFE->setTitle("Title $i");
            $PFE->setName($faker->name);
            $manager->persist($PFE);
        }
        $manager->flush();
    }
}