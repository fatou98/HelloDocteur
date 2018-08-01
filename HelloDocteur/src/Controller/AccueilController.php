<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Specialite;
use App\Repository\SpecialiteRepository;
use App\Repository\QuartierRepository;
use App\Repository\RegionRepository;
use App\Repository\MedecinRepository;
use App\Repository\StructureRepository;
use Symfony\Component\HttpFoundation\Request;

class AccueilController extends Controller
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index()
    {
        return $this->render('accueil/layoutaccueil.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    
        /**
         * @Route("/apropos", name="apropos")
         */
        public function apropos()
        {
            return $this->render('accueil/apropos.html.twig', [
                'controller_name' => 'AccueilController',
            ]);
        }
          /**
         * @Route("/search", name="search")
         */
        public function search(Request $request,MedecinRepository $medecinrepo,StructureRepository $structurerepo)
        {
            $em = $this->getDoctrine()->getManager();
            $medecins=$medecinrepo->findAll();
            $structures=$structurerepo->findAll();

            return $this->render('accueil/search.html.twig', [
                'medecins' => $medecins,
                'structures' => $structures
            ]);
        }
        /**
     * @Route("/accueil", name="accueil")
     */
            public function specialite(Request $request,SpecialiteRepository $specialiterepo,RegionRepository $regionrepo)
            {

            
            $em = $this->getDoctrine()->getManager();
            $specialites=$specialiterepo->findAll();
            $regions=$regionrepo->findAll();


            return $this->render('accueil/layoutaccueil.html.twig', [
                'specialites'=>$specialites,
                'regions'=>$regions
            ]);
            }
}