<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Document;

class DocumentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=1; $i < 10; $i++) { 
            $document = new Document();
            $document->setTitle("Titre du document n°$i")
                    ->setContent("Texte du document n°$i")
                    ->setImage("https://placehold.it/350x150")
                    ->setIdType("$i");
            $manager->persist($document);
        }

        $manager->flush();
    }
}
