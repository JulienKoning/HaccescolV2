<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Document;
use App\Repository\DocumentRepository;

class SiteHacceScolController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('site_hacce_scol/home.html.twig');
    }

    /**
     * @Route("/site_hacce_scol/parcourir", name="site_index")
     */
    public function index(DocumentRepository $repo)
    {
        $documents = $repo->findAll();

        return $this->render('site_hacce_scol/index.html.twig',[
            'documents' => $documents
        ]);
    }
    
    /**
     * @Route("/site_hacce_scol/ajouter", name="site_ajouter")
     */

    public function ajouter(Request $req){
        return $this->render('site_hacce_scol/ajouter.html.twig');
    }

    /**
     * @Route("/site_hacce_scol/{id}", name="site_show" )
     */
    public function show(Document $document)
    {
        return $this->render('site_hacce_scol/show.html.twig', [
            'document' => $document
        ]);
    }
    
}
