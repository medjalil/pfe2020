<?php

namespace App\DataFixtures;

use App\Entity\Actualite;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture {

    public function load(ObjectManager $manager) {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 8; $i++) {
            $actualite = new Actualite();
            $actualite->settitre($faker->text($maxNbChars = 100));
            $actualite->setcontenu($faker->realText($maxNbChars = 200, $indexSize = 2));
            $actualite->setImage($faker->imageUrl($width = 640, $height = 480, 'cats'));
            $actualite->setCreatedAt($faker->dateTime($max = 'now'));
            $manager->persist($actualite);
        }

        
    }

}
