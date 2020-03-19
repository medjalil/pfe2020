<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixtures extends Fixture {

    public function load(ObjectManager $manager) {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 8; $i++) {
            $product = new Product();
            $product->setName($faker->text($maxNbChars = 100));
            $product->setDescription($faker->realText($maxNbChars = 200, $indexSize = 2));
            $product->setImage($faker->imageUrl($width = 640, $height = 480, 'cats'));
            $product->setCreatedAt($faker->dateTime($max = 'now'));
            $manager->persist($product);
        }
        $manager->flush();
    }

}
