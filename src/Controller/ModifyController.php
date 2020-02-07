<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Document;
use App\Form\DocumentAddType;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ModifyController extends AbstractController
{
    /**
     * @Route("/modify", name="modify")
     */
    public function index()
    {
        return $this->render('modify/index.html.twig', [
            'controller_name' => 'ModifyController',
        ]);
    }

    /**
     * @Route("/modify/add", name="ajouter")
     */

    public function ajouter(CategoryRepository $categoryRepository, Request $request){

        $doc = new Document();
        $form = $this->createForm(DocumentAddType::class, $doc, [
            'categories'=>$categoryRepository->findAll()
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($_POST['newCategory'])
            {
                $category = new Category();
                $category->setName($_POST['newCategory']);

                #$manager->persist($category);

            }
        }

        return $this->render('modify/ajouter.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("modify/editer", name="editer")
     */
    public function edit(){
        return $this->render('modify/editer.html.twig');
    }
}
