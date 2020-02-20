<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Document;
use App\Form\DocumentAddType;
use App\Kernel;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use thiagoalessio\TesseractOCR\TesseractOCR;

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
        if ($form->isSubmitted())
        {

            //$text = (new TesseractOCR($this->getParameter('kernel.root_dir') . '\..\public\images\documents'.$doc->getImage()))
            $text = (new TesseractOCR(($form['imageFile']->getData())))
                ->lang('fra')
                ->run();
            $doc->setContent($text);
            $this->getDoctrine()->getManager()->persist($doc);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('site_show', ['id' => $doc->getId()]);
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
