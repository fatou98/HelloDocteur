<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\MedecinRepository;
use App\Repository\CreneauRepository;
use App\Repository\CreneauItemRepository;
use App\Entity\Creneau;
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
    /**
     * @Route("/ListeCReneau", name="ListeCReneau")
     */
    public function getAllCreneau(MedecinRepository $medecinrepo,CreneauRepository $creneaurepo,Request $request) {
        $usermedecin= $this->getUser();
        $emailmedecin=$usermedecin->getEmail();
        $medecinloggedIn=$medecinrepo->findBy(['Email'=>$emailmedecin]);
        $idmedecin=$medecinloggedIn[0]->getId();

        $listecreneau=$creneaurepo->findBy(['medecin'=>$idmedecin]);
        
        return $this->render('medecin/listecreneau.html.twig', [
            'creneau'=>$listecreneau,
            'medecinloggedIn'=>$medecinloggedIn
        ]);
    }
    /**
     * @Route("/AddCreneau", name="AddCreneau")
     */
    public function AddCreneau(MedecinRepository $medecinrepo,CreneauItemRepository $creneauitemrepo,CreneauRepository $creneaurepo,Request $request) {
        $usermedecin= $this->getUser();
        $emailmedecin=$usermedecin->getEmail();
        $medecinloggedIn=$medecinrepo->findBy(['Email'=>$emailmedecin]);
        $idmedecin=$medecinloggedIn[0]->getId();
        $listecreneauitem=$creneauitemrepo->findAll();
    if(isset($_POST['AJouter'])){
            if($request->isMethod('POST')){
                extract($_POST);
        $lecreneauitem=$creneauitemrepo->findOneBy(['id'=>$un]);

        $creneau= new Creneau();
        $creneau->setHeuredebut($heuredebut);
        $creneau->setHeurefin($heurefin);
        $creneau->setEtat(false);
        $creneau->setMedecin($medecinloggedIn[0]);
        $creneau->setCreneauitem($lecreneauitem);
        $em=$this->getDoctrine()->getManager();
        $em->persist($creneau);
        $em->flush();
        $this->addFlash('info', 'Ajouté avec succes.');
        return $this->redirectToRoute('ListeCReneau');
       
            }
    }
        return $this->render('medecin/addcreneau.html.twig', [
            'medecinloggedIn'=>$medecinloggedIn,
            'listecreneauitem'=>$listecreneauitem
        ]);
    }
 /**
     * @Route("/creneauedit/{id}", name="creneauedit")
    */
    public function creneauedit($id,MedecinRepository $medecinrepo,CreneauItemRepository $creneauitemrepo,CreneauRepository $creneaurepo,Request $request)
    {

        $usermedecin= $this->getUser();
        $emailmedecin=$usermedecin->getEmail();
        $medecinloggedIn=$medecinrepo->findBy(['Email'=>$emailmedecin]);
        $idmedecin=$medecinloggedIn[0]->getId();
        $listecreneauitem=$creneauitemrepo->findAll();

        if(isset($_POST['MOdifier'])){
            if($request->isMethod('POST')){
                extract($_POST);
        $lecreneauitem=$creneauitemrepo->findBy(['id'=>$id]);

        $creneau= new Creneau();
        $creneau->setHeuredebut($heuredebut);
        $creneau->setHeurefin($heurefin);
        $creneau->setEtat(false);
        $creneau->setMedecin($medecinloggedIn[0]);
        $creneau->setCreneauitem($lecreneauitem);
        $em=$this->getDoctrine()->getManager();
        $em->persist($creneau);
        $em->flush();
        $this->addFlash('info', 'modifier avec succes.');
        return $this->redirectToRoute('ListeCReneau');
       
            }
    }
        return $this->render('medecin/editcreneau.html.twig', [
            'medecinloggedIn'=>$medecinloggedIn,
            'listecreneauitem'=>$listecreneauitem
        ]);
}
}