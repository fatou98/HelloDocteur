<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Had;
use App\Repository\HadRepository;
use App\Repository\LivraisonRepository;
use App\Repository\VslRepository;
use App\Entity\Vsl;
use App\Entity\Livraison;
use Symfony\Component\HttpFoundation\Request;

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
    public function listehad(HadRepository $hadrepo)
    {
        //$em = $this->getDoctrine()->getManager();
        $hads= $hadrepo->findAll();
        return $this->render('admin/listehad.html.twig', 
        array('Had' => $hads));    
    }
    /**
     * @Route("/editHad/{id}", name="editHad")
    */
    public function edithad($id,HadRepository $hadrepo,Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $hads= $hadrepo->findBy(['id'=>$id]);
        if(isset($_POST['modifier'])){
            if($request->isMethod('POST')){
                extract($_POST);
                $hads[0]->setAdresse($adresse);
                $hads[0]->setTel($tel);
                $hads[0]->setMotif($motif);
                $em->persist($hads[0]);
                $em->flush();
                $this->addFlash('info', 'Modification enregistré avec succes.');
            }
        }

        return $this->render('admin/edithad.html.twig', 
        array('Had' => $hads));    
    }
    /**
     * @Route("/listevsl", name="listevsl")
     */
    public function listevsl()
    {
        $user=$this->getUser();

        $vsls = $this->getDoctrine()->getRepository(Vsl::Class)->findAll();

        return $this->render('admin/listevsl.html.twig',array('vsl'=>$vsls,'users'=>$user)); 
  }
  /**
     * @Route("/listelivraison", name="listelivraison")
     */
    public function listelivraison()
    {
        $user=$this->getUser();

        $livraisons = $this->getDoctrine()->getRepository(Livraison::Class)->findAll();

        return $this->render('admin/listelivraison.html.twig',array('livraison'=>$livraisons,'users'=>$user)); 
    }

    /**
     * @Route("/livraisonedit/{id}", name="livraisonedit")
    */
    public function livraisonedit($id,LivraisonRepository $livraisonrepo,Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $livraisons= $livraisonrepo->findBy(['id'=>$id]);
        if(isset($_POST['modifier'])){
            if($request->isMethod('POST')){
                extract($_POST);
                $livraisons[0]->setNomComplet($nom);
                $livraisons[0]->setAdresse($adresse);
                $livraisons[0]->setTel($tel);
                $livraisons[0]->setOrdonnance($ordonnance);
                $em->persist($livraisons[0]);
                $em->flush();
                $this->addFlash('info', 'Modification enregistré avec succes.');
            }
        }

        return $this->render('admin/livraisonedit.html.twig', 
        array('Livraison' => $livraisons));    
    }
    /**
     * @Route("/vsledit/{id}", name="vsledit")
    */
    public function vsledit($id,VslRepository $vslrepo,Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $vsls= $vslrepo->findBy(['id'=>$id]);
        if(isset($_POST['modifier'])){
            if($request->isMethod('POST')){
                extract($_POST);
                $vsls[0]->setNomComplet($nom);
                $vsls[0]->setAdresse($adresse);
                $vsls[0]->setTel($tel);
                $vsls[0]->setFichemaladie($fiche);
                $vsls[0]->setMotif($motif);
                $em->persist($vsls[0]);
                $em->flush();
                $this->addFlash('info', 'Modification enregistré avec succes.');
            }
        }

        return $this->render('admin/listevsledit.html.twig', 
        array('Vsl' => $vsls));    
    }
}

