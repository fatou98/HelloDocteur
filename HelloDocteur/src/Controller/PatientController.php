<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Had;
use App\Entity\Vsl;
use App\Entity\Livraison;
use App\Entity\PriseDeRendezvous;
use App\Entity\NewsletterRepository;
use App\Repository\PatientRepository;
use App\Repository\MedecinRepository;
use App\Repository\CreneauRepository;
use App\Repository\CreneauItemRepository;

use App\Repository\HadRepository;
use App\Repository\LivraisonRepository;
use App\Repository\PriseDeRendezvousRepository;
use App\Repository\VslRepository;

use App\Repository\SpecialiteRepository;
use App\Repository\RegionRepository;
class PatientController extends Controller
{
    /**
     * @Route("/patient", name="patient")
     */
    public function index(HadRepository $hadrepo,LivraisonRepository $livraisonrepo,
    PriseDeRendezvousRepository $prisederdvrepo,VslRepository $vslrepo ,PatientRepository $patientrepo)
    {
        $user=$this->getUser();
        $email=$user->getEmail();
        $patient=$patientrepo->findOneBy(['Email'=>$email]);
        $iduser=$patient->getId();
        $listerdv = $prisederdvrepo->findBy(['patient'=>$iduser]);
        $listehad = $hadrepo->findBy(['Patient'=>$iduser]);
        $listelivraison = $livraisonrepo->findBy(['Patient'=>$iduser]);
        $listevsl = $vslrepo->findBy(['Patient'=>$iduser]);
        return $this->render('patient/index.html.twig', [
        'controller_name' => 'PatientController',
        'user'=>$user,
        'listehad'=>$listehad,
        'listerdv'=>$listerdv,
        'listelivraison'=>$listelivraison,
        'listevsl'=>$listevsl

        ]);
    }
    /**
     * @Route("/had", name="had")
     */
    public function had(Request $request,PatientRepository $patientrepo)
    {
        $em = $this->getDoctrine()->getManager();
            $user=$this->getUser();
            $email=$user->getEmail();
            $patient=$patientrepo->findBy(['Email'=>$email]);
           
            if(isset($_POST['ajouter'])){
              
            if($request->isMethod('POST')) {
                        extract($_POST);
                       
                        $had = new  Had();
                        $had->setAdresse($adresse);
                        $had->setTel($tel);
                        $had->setMotif($motif);
                        $had->setPatient($patient[0]);
                        $had->setEtat(false);
                        $had->setDatedemande(new \DateTime('now'));
                        $em->persist($had);
                        $em->flush();
                        $this->addFlash('success', 'Votre demande a bien été enregistré.');

                    }
                }
                          return $this->render('patient/had.html.twig',[
        'user'=>$user
                        
                          ]);
                        }
   
    /**
     * @Route("/prisederdv/{idmedecin}/{idcreneau}/{iddatecreneau}", name="prisederdv")
     */
    public function prisederdv(Request $request,PatientRepository $patientrepo,
    CreneauRepository $creneaurepo,
    CreneauItemRepository $creneauitemrepo,
    MedecinRepository $medecinrepo,$idmedecin,$idcreneau,$iddatecreneau)
    {
        $user=$this->getUser();

        $em = $this->getDoctrine()->getManager();
            $user=$this->getUser();
            $email=$user->getEmail();
            $patient=$patientrepo->findOneBy(['Email'=>$email]);
            $medecin = $medecinrepo->findOneBy(['id'=>$idmedecin]);
            $creneau = $creneaurepo->findOneBy(['id'=>$idcreneau,'creneauitem'=>$iddatecreneau]);
            if(isset($_POST['valider'])){
            if($request->isMethod('POST')) {
                        extract($_POST);
                        $prisederdv = new  PriseDeRendezvous();
                        $prisederdv->setMotif($motif);
                        $prisederdv->setPatient($patient);
                        $prisederdv->setCreneau($creneau);
                        $prisederdv->setMedecin($medecin);
                        $prisederdv->setEtat(false);

                        $prisederdv->setDatedemande(new \DateTime('now'));
                        $em->persist($prisederdv);
                        $em->flush();
                        $this->addFlash('success', 'Votre demande a bien été enregistré.');

                    }
                }
                          return $this->render('patient/prisederdv.html.twig',[
                        'medecin'=>$medecin,
                        'creneau'=>$creneau,
        'user'=>$user

                          ]);
                        }
                  /**
     * @Route("/vsl", name="vsl")
     */
    public function vsl(Request $request,PatientRepository $patientrepo)
    {
        $user=$this->getUser();

        $em = $this->getDoctrine()->getManager();
        $user=$this->getUser();
        $email=$user->getEmail();
        $patient=$patientrepo->findBy(['Email'=>$email]);
       
        if(isset($_POST['ajouter'])){
          
        if($request->isMethod('POST')) {
                    extract($_POST);
                   
                    $vsl = new  Vsl();
                    $vsl->setNomComplet($nom);
                    $vsl->setAdresse($adresse);
                    $vsl->setTel($tel);
                    $vsl->setFicheMaladie($fiche);
                    $vsl->setMotif($motif);
                    $vsl->setPatient($patient[0]);

                    $vsl->setEtat(false);
                    $vsl->setDatedemande(new \DateTime('now'));
                    $em->persist($vsl);
                    $em->flush();
                    $this->addFlash('success', 'Votre demande a bien été enregistré.');

                }
            }
                      return $this->render('patient/vsl.html.twig',[
        'user'=>$user
                    
                      ]);
                    }
    /**
     * @Route("/livraison", name="livraison")
     */
    public function livraison(Request $request,PatientRepository $patientrepo)
    {
        $user=$this->getUser();

        $em = $this->getDoctrine()->getManager();
        $user=$this->getUser();
        $email=$user->getEmail();
        $patient=$patientrepo->findBy(['Email'=>$email]);
       
        if(isset($_POST['ajouter'])){
          
        if($request->isMethod('POST')) {
                    extract($_POST);
                   
                    $livraison = new  Livraison();
                    $livraison->setNomComplet($nom);
                    $livraison->setAdresse($adresse);
                    $livraison->setTel($tel);
                    $livraison->setOrdonnance(file_get_contents($_FILES['ordonnance']['tmp_name']));
                    $livraison->setPatient($patient[0]);
                    $livraison->setEtat(false);
                    $livraison->setDatedemande(new \DateTime('now'));
                    $em->persist($livraison);
                    $em->flush();
                    $this->addFlash('success', 'Votre demande a bien été enregistré.');

                }
            }
                      return $this->render('patient/livraison.html.twig',[
        'user'=>$user
                    
                      ]);
                    }

                     /**
     * @Route("/annulaire", name="annulaire")
     */
    public function specialite(MedecinRepository $medecinrepo,Request $request,SpecialiteRepository $specialiterepo,RegionRepository $regionrepo)
    {
    
    $specialites=$specialiterepo->findAll();
    $regions=$regionrepo->findAll();


$medecins=$medecinrepo->findAll();
        return $this->render('patient/annulaire.html.twig',[
            'medecins'=>$medecins,
            'specialites'=>$specialites,
        'regions'=>$regions,
                     
                          ]);

    }
}
                     
                  
                
            