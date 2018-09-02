<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\MedecinRepository;
use App\Entity\Medecin;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;


class MedecinController extends Controller
{
    /**
     * @Route("/medecin", name="medecin")
     */
    public function index(MedecinRepository $medecinrepo)
    {
        $usermedecin= $this->getUser();
        $emailmedecin=$usermedecin->getEmail();
        $medecinloggedIn=$medecinrepo->findBy(['Email'=>$emailmedecin]);
        return $this->render('medecin/index.html.twig', [
            'controller_name' => 'MedecinController','medecinloggedIn'=>$medecinloggedIn
        ]);
    }
   
}
