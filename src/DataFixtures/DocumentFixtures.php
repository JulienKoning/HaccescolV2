<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Document;
use App\Entity\Category;


class DocumentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=1; $i < 4; $i++) {
            $category = new Category(); 
            switch ($i) {
                case '1':
                    $category->setName("Plan");
                    break;

                case '2':
                    $category->setName("Texte");
                    break;

                case '3':
                    $category->setName("Inconnu");
                    break;
                
                default:
                    
                    break;
            }
            $manager->persist($category);

            for ($j=1; $j < 10; $j++) {
                $num = ($i -1)*10 + $j; 
                $document = new Document();
                $document->setTitle("Titre du document n°$num")
                        ->setContent("Texte du document n°$num")
                        ->setImage("https://placehold.it/350x150")
                        ->setCategory($category);
                $manager->persist($document);
            }
        }

        $manager->flush();
    }
}
