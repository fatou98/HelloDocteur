<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Had;
use App\Entity\Vsl;
use App\Entity\Livraison;
use App\Entity\NewsletterRepository;
use App\Repository\PatientRepository;


class PatientController extends Controller
{
    /**
     * @Route("/patient", name="patient")
     */
    public function index()
    {
        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
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
                        $em->persist($had);
                        $em->flush();
                        $this->addFlash('success', 'Votre demande a bien été enregistré.');

                    }
                }
                          return $this->render('patient/had.html.twig',[
                        
                          ]);
                        }
   
    /**
     * @Route("/prisederdv/{idmedecin}/{idcreneau}", name="had")
     */
    public function prisederdv(Request $request,PatientRepository $patientrepo,$idmedecin,$idcreneau)
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
                        $em->persist($had);
                        $em->flush();
                        $this->addFlash('success', 'Votre demande a bien été enregistré.');

                    }
                }
                          return $this->render('patient/had.html.twig',[
                        
                          ]);
                        }
                  /**
     * @Route("/vsl", name="vsl")
     */
    public function vsl(Request $request,PatientRepository $patientrepo)
    {
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
                    $em->persist($vsl);
                    $em->flush();
                    $this->addFlash('success', 'Votre demande a bien été enregistré.');

                }
            }
                      return $this->render('patient/vsl.html.twig',[
                    
                      ]);
                    }
    /**
     * @Route("/livraison", name="livraison")
     */
    public function livraison(Request $request,PatientRepository $patientrepo)
    {
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
                    $livraison->setOrdonnance($ordonnance);
                    $livraison->setPatient($patient[0]);
                    $em->persist($livraison);
                    $em->flush();
                    $this->addFlash('success', 'Votre demande a bien été enregistré.');

                }
            }
                      return $this->render('patient/livraison.html.twig',[
                    
                      ]);
                    }
}
                     
                  
                
            