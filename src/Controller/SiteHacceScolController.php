<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Document;
use App\Entity\DocumentSearch;
use App\Form\DocumentSearchType;
use App\Repository\DocumentRepository;
use Knp\Component\Pager\PaginatorInterface;

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
    public function index(DocumentRepository $repo, CategoryRepository $categoryRepository, PaginatorInterface $paginator, Request $request)
    {
        $search = new DocumentSearch();
        $form = $this->createForm(DocumentSearchType::class, $search, );
        $form->handleRequest($request);
        $documents = $paginator->paginate($repo->findAllQuery($search),
            $request->query->getInt('page', 1),
            21);

        return $this->render('site_hacce_scol/index.html.twig',[
            'documents' => $documents,
            'form' => $form->createView()
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
