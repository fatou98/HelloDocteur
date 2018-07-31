<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Specialite;
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
         * @Route("/apropos", name="apropos")
         */
        public function contact()
        {
            return $this->render('accueil/apropos.html.twig', [
                'controller_name' => 'AccueilController',
            ]);
        }
        /**
     * @Route("/accueil", name="accueil")
     */
public function specialite(Request $request)
{

   
$em = $this->getDoctrine()->getManager();
$specialitet=$em->getRepository(Specialite::class)->findAll();;


return $this->render('accueil/layoutaccueil.html.twig', [
    'specialites'=>$specialitet
]);
}
}