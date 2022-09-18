<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Visite;

class VisiteFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //création du faker pour la génération des valeur aléatoire
        $faker=Factory::create('fr_FR');
        
        //génération des enregistrements
        for($k=0 ; $k<100; $k++){ 
            $visite = new Visite();
            $visite->setVille($faker->city)
                    ->setPays($faker->country)
                    ->setDatecreation($faker->dateTimeBetween('-10 years', 'now'))
                    ->setTempmin($faker->numberBetween(-20,10))
                    ->setTempmax($faker->numberBetween(10,40))
                    ->setNote($faker->numberBetween(0,20))
                    ->setAvis($faker->sentence(4, true));
            //Enregistrement de l'objet
            $manager->persist($visite);
        }
        $manager->flush();
    }
}
