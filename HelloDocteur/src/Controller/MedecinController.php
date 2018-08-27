<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MedecinController extends Controller
{
    /**
     * @Route("/medecin", name="medecin")
     */
    public function index()
    {
        return $this->render('medecin/index.html.twig', [
            'controller_name' => 'MedecinController',
        ]);
    }
    public function listemedcin(MedecinRepository $medecinrepo)
    {
        
        $medecins= $medecinrepo->findAll();
        return $this->render('medecin/listemedecin.html.twig', 
        array('Medecin' => $medecins));    
    }
}
