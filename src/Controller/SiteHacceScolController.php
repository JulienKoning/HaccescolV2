<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
    public function index()
    {
        return $this->render('site_hacce_scol/index.html.twig');
    }

    /**
     * @Route("/site_hacce_scol/1", name="site_show" )
     */
    public function show()
    {
        return $this->render('site_hacce_scol/show.html.twig');
    }

    
}
