<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Had;
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
            $patient=$patientrepo->findAll();
                    if($request->isMethod('POST')) {
                    if(isset($_POST['Envoyez'])){
                        extract($_POST);
                    $patient=$em->getRepository(Patient::class)->findById(array('id'=>$patient));
    
                        $had = new  Had();
                        $had->setAdresse($adresse);
                        $had->setTel($tel);
                        $had->setMotif($motif);
                        $had->setClient($patient[0]);
                        $em->persist($had);
                        $em->flush();
                       
                    }
                }
                          return $this->render('Patient/had.html.twig',[
                        
                          ]);
                        }
    /**
     * @Route("/vsl", name="vsl")
     */
    public function vsl(Request $request,PatientRepository $patientrepo)
    {
        $em = $this->getDoctrine()->getManager();
            $patient=$patientrepo->findAll();
                    if($request->isMethod('POST')) {
                    if(isset($_POST['valider'])){
                        extract($_POST);
                    $patient=$em->getRepository(Patient::class)->findById(array('id'=>$patient));
    
                        $vsl = new  Vsl();
                        $vsl->setNomComplet($nomcomplet);
                        $vsl->setAdresse($adresse);
                        $vsl->setTel($telephone);
                        $vsl->setFichemaladie($fichemaladie);
                        $vsl->setClient($patient[0]);
                        $em->persist($vsl);
                        $em->flush();
                       
                    }
                }
                          return $this->render('patient/vsl.html.twig',[
                            'patients'=>$patient
                                
                          ]);
                        }
    /**
     * @Route("/livraison", name="livraison")
     */
    public function livraison()
    {
        return $this->render('patient/livraison.html.twig', [
            'controller_name' => 'PatientController',
        ]);
    }
}
