<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Had;
use App\Entity\Vsl;
use App\Entity\Livraison;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
     /**
     * @Route("/listehad", name="listehad")
     */
    public function listehad()
    {
        $em = $this->getDoctrine()->getManager();
        $hads= $em->getRepository(Had::class)->findAll();
        return $this->render('admin/listehad.html.twig', 
        array('Had' => $hads));    
    }
    /**
     * @Route("/listevsl", name="listevsl")
     */
    public function listevsl()
    {
        $user=$this->getUser();

        $hads = $this->getDoctrine()->getRepository(Vsl::Class)->findAll();

        return $this->render('admin/listevsl.html.twig',array('had'=>$hads,'users'=>$user)); 
  }
  /**
     * @Route("/listelivraison", name="listelivraison")
     */
    public function listelivraison()
    {
        $user=$this->getUser();

        $hads = $this->getDoctrine()->getRepository(Livraison::Class)->findAll();

        return $this->render('admin/listelivraison.html.twig',array('had'=>$hads,'users'=>$user)); 
    }
}

