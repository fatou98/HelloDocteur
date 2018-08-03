<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    public function had()
    {
        return $this->render('patient/had.html.twig', [
            'controller_name' => 'PatientController',
        ]);
    }
    /**
     * @Route("/vsl", name="vsl")
     */
    public function vsl()
    {
        return $this->render('patient/vsl.html.twig', [
            'controller_name' => 'PatientController',
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
