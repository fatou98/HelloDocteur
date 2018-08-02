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
         * @Route("/contact", name="contact")
         */
        public function contact()
        {
            return $this->render('accueil/contact.html.twig', [
                'controller_name' => 'AccueilController',
            ]);
        }
          /**
         * @Route("/search", name="search")
         */
        public function search(Request $request,MedecinRepository $medecinrepo,StructureRepository $structurerepo,SpecialiteRepository $specialiterepo,RegionRepository $regionrepo)
        {

            $em = $this->getDoctrine()->getManager();
            $medecins=$medecinrepo->findAll();
            foreach($medecins as $values){
                    $values->setImage(base64_encode(stream_get_contents($values->getImage())));
                
            }
            $structures=$structurerepo->findAll();
            $em = $this->getDoctrine()->getManager();
            $specialites=$specialiterepo->findAll();
            $regions=$regionrepo->findAll();

            return $this->render('accueil/search.html.twig', [
                'medecins' => $medecins,
                'structures' => $structures,
                'specialites'=>$specialites,
                'regions'=>$regions
            ]);
        }
        /**
     * @Route("/accueil", name="accueil")
     */
    public function specialite(MedecinRepository $medecinrepo,Request $request,SpecialiteRepository $specialiterepo,RegionRepository $regionrepo)
    {

    
    $em = $this->getDoctrine()->getManager();
    $specialites=$specialiterepo->findAll();
    $regions=$regionrepo->findAll();


    return $this->render('accueil/layoutaccueil.html.twig', [
        'specialites'=>$specialites,
        'regions'=>$regions
    ]);
    }
      /**
     * @Route("/detailMedecin/{id}", name="detailMedecin")
     */
    public function detailmedecin(Request $request,$id,SpecialiteRepository $specialiterepo,RegionRepository $regionrepo,MedecinRepository $medecinrepo)
    {

    
    $em = $this->getDoctrine()->getManager();
    $specialites=$specialiterepo->findAll();
    $regions=$regionrepo->findAll();
    $medecinBYId=$medecinrepo->findById(['id'=>$id]);

    return $this->render('accueil/detailmedcin.html.twig', [
        'specialites'=>$specialites,
        'regions'=>$regions,
        'medecin'=>$medecinBYId
    ]);
    }
    /**
     * @Route("/detailstructure/{id}", name="detailstructure")
     */
    public function detailstructure(Request $request,$id,StructureRepository $structurerepo)
    {

    
        $em = $this->getDoctrine()->getManager();
        $structures=$structurerepo->findById(['id'=>$id]);
        
        return $this->render('accueil/detailstructure.html.twig', [
          'structures'=>$structures,
          
    ]);
    }
     /**
     * @Route("/rechercher", name="rechercher")
     */
    public function recherche(Request $request,SpecialiteRepository $specialiterepo)
    {

    
        $specialite = new Specialite();
                            if($request->isMethod('POST')){
                            if(empty($specialite) and empty($lieu)){
                                     $specialite = $this->getDoctrine()->getManager()
                            ->getRepository(Specialite::class)
                                       ->FindAllSpecialite();
                            $specialite= $this->get('knp_paginator')->paginate(
                            $specialite,
                            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
                              6/*nbre d'éléments par page*/
                            );
                $specialite = $this->getDoctrine()->getManager()->getRepository(Specialite::class)->findAll();
                $region = $this->getDoctrine()->getManager()->getRepository(Region::class)
                                ->findAll();
        
        return $this->render('accueil/search.html.twig', [
          'specialites'=>$specialites,
          'region'=>$region,
          
    ]);
    }
}
    }}