<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PFEFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $repository = $manager->getRepository(Entreprise::class);
            $PFE = new PFE();
            $PFE->setTitle("Title $i");
            $PFE->setName($faker->name);
            $random = rand(850, 1000);
            $entreprise = $repository->find($random);
            $PFE->setEntreprise($entreprise);
            $manager->persist($PFE);
        }
        $manager->flush();
    }
}