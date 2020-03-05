<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Produits;
class ProduitsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i =1; $i <=10 ;$i++){

         $produit = new Produits();
         $produit->settitle("nom produit n°$i")
                ->setcontent("<p> contenu de produit <p>")
                ->setimage("https://via.placeholder.com/150/0000FF/808080 ?Text=Digital.com

                C/O https://placeholder.com/")
                ->setcreatedAt(new \DateTime());
                $manager->persist($produit);
        }
        $manager->flush();
    }


}
