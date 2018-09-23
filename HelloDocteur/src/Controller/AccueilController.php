<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Specialite;
use App\Entity\Newsletter;
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
        $user=$this->getUser();
        return $this->render('accueil/layoutaccueil.html.twig', [
            'controller_name' => 'AccueilController',
            'user'=>$user
        ]);
    }
    
        /**
         * @Route("/contact", name="contact")
         */
        public function contact()
        {
        $user=$this->getUser();

            return $this->render('accueil/contact.html.twig', [
                'controller_name' => 'AccueilController',
            'user'=>$user

            ]);
        }
          /**
         * @Route("/search", name="search")
         */
        public function search(Request $request,MedecinRepository $medecinrepo,StructureRepository $structurerepo,SpecialiteRepository $specialiterepo,RegionRepository $regionrepo)
        {
        $user=$this->getUser();

            setlocale(LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
            $em = $this->getDoctrine()->getManager();
            $precedent=0;
            $suivant=4;
            $medecins=$medecinrepo->findAll();
            
           
            if(isset($_POST['Sinscrire'])){
                if($request->isMethod('POST')) {
                     extract($_POST);
                     $newsletter = new  Newsletter();
                     $newsletter->setEmail($newsletterEmail);
                     $em->persist($newsletter);
                     $em->flush();
                     $this->addFlash('success', 'Votre demande a bien été enregistré.');

                 }
            }

            if(isset($_POST['Rechercher'])){
                extract($_POST);
                if($request->isMethod('POST')){
                    if($specialite==null && $lieu==null ){
                        $medecins=$medecinrepo->findAll();
                    }
                     else if($specialite==null){
                        $medecins=$medecinrepo->findByRegion($lieu);
                    }
                   else if($lieu==null){
                        
                        $medecins=$medecinrepo->findBySpecialite($specialite);
                        
                    }
                    else{
                        $medecins=$medecinrepo->findBySpecialiteAndRegion($specialite,$lieu);
                    }

                }

            }
            
            foreach ($medecins as $values) {
                $values->setCreneau($this->get('knp_paginator')->paginate(
                    $values->getCreneau(),
                    $request->query->get('page', 1)/*le numéro de la page à afficher*/,
                      4/*nbre d'éléments par page*/
                ));
                $values->setImage(base64_encode(stream_get_contents($values->getImage())));

            }
           
            $structureslist=$structurerepo->findAll();
            $structures = $this->get('knp_paginator')->paginate(
                $structureslist,
                $request->query->get('page', 1)/*le numéro de la page à afficher*/,
                  10/*nbre d'éléments par page*/
            );
            $em = $this->getDoctrine()->getManager();
            $specialites=$specialiterepo->findAll();
            $regions=$regionrepo->findAll();

            return $this->render('accueil/search.html.twig', [
                'medecins' => $medecins,
                'structures' => $structures,
                'specialites'=>$specialites,
                'regions'=>$regions,
            'user'=>$user

                
            ]);
        }
        
        /**
     * @Route("/accueil", name="accueil")
     */
    public function specialite(MedecinRepository $medecinrepo,Request $request,SpecialiteRepository $specialiterepo,RegionRepository $regionrepo)
    {
        $user=$this->getUser();

    
    $em = $this->getDoctrine()->getManager();
    $specialites=$specialiterepo->findAll();
    $regions=$regionrepo->findAll();


    return $this->render('accueil/layoutaccueil.html.twig', [
        'specialites'=>$specialites,
        'regions'=>$regions,
        'user'=>$user

    ]);
    }
      /**
     * @Route("/detailMedecin/{id}", name="detailMedecin")
     */
    public function detailmedecin(Request $request,$id,SpecialiteRepository $specialiterepo,RegionRepository $regionrepo,MedecinRepository $medecinrepo)
    {

        $user=$this->getUser();
    
    $em = $this->getDoctrine()->getManager();
    $specialites=$specialiterepo->findAll();
    $regions=$regionrepo->findAll();
    $medecinBYId=$medecinrepo->findOneBy(['id'=>$id]);
    foreach($medecinBYId as $values){
        $values->setImage(base64_encode(stream_get_contents($values->getImage())));
    
}
    return $this->render('accueil/detailmedcin.html.twig', [
        'specialites'=>$specialites,
        'regions'=>$regions,
        'medecin'=>$medecinBYId,
        'user'=>$user
        
    ]);
    }
    /**
     * @Route("/detailstructure/{id}", name="detailstructure")
     */
    public function detailstructure(Request $request,$id,StructureRepository $structurerepo)
    {    $user=$this->getUser();

        $em = $this->getDoctrine()->getManager();
        $structures=$structurerepo->findById(['id'=>$id]);

        return $this->render('accueil/detailstructure.html.twig', [
        'structures'=>$structures,  
        'user'=>$user

    ]);
    }
    /** 
   * @Route("/precedent") 
*/ 
public function precedentAction(Request $request) {  
  
    if ($request->isXmlHttpRequest()) {  
       $precedent=0;  
      
       return $precedent; 
    } else { 
       return $this->render('accueil/search.html.twig'); 
    } 
 }     
    
}
    