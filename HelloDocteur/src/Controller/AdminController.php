<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Had;
use App\Entity\Structure;
use App\Repository\TypeStructureRepository;
use App\Repository\MedecinRepository;
use App\Repository\QuartierRepository;
use App\Repository\StructureRepository;
use App\Repository\HadRepository;
use App\Repository\LivraisonRepository;
use App\Repository\PriseDeRendezvousRepository;
use App\Repository\VslRepository;
use App\Entity\Vsl;
use App\Entity\Livraison;
use App\Entity\TypeStructure;
use App\Entity\Medecin;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        $user= $this->getUser();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'user'=>$user
        ]);
    }
     /**
     * @Route("/listeprv", name="listeprv")
     */
    public function listeprv(PriseDeRendezvousRepository $prvrepo)
    {
        $user= $this->getUser();
        
        $prvs= $prvrepo->findAll();
        return $this->render('admin/listeprv.html.twig', 
        array('PriseDeRendezvous' => $prvs,
        'user'=>$user

    ));    
    }
    /**
     * @Route("/editprv/{id}", name="editprv")
    */
    public function editprv($id,PriseDeRendezvousRepository $prvrepo,Request $request)
    {
        $user= $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $prvs= $prvrepo->findBy(['id'=>$id]);
        if(isset($_POST['modifier'])){
            if($request->isMethod('POST')){
                extract($_POST);
                $prvs[0]->setMotif($motif);
                $prvs[0]->setCreneau($creneau);
                $prvs[0]->setMedecin($medecin);
                $prvs[0]->setPatient($patient);
                $em->persist($prvs[0]);
                $em->flush();
                
                $this->addFlash('info', 'Modification enregistré avec succes.');
        return $this->redirectToRoute('listehad');
           
            }
        }

        return $this->render('admin/edithad.html.twig', 
        array('Had' => $hads,
        'user'=>$user
    
    ));    
    }
    
     /**
     * @Route("/listehad", name="listehad")
     */
    public function listehad(HadRepository $hadrepo)
    {
        $user= $this->getUser();

        //$em = $this->getDoctrine()->getManager();
        $hads= $hadrepo->findAll();
        return $this->render('admin/listehad.html.twig', 
        array('Had' => $hads,
        'user'=>$user
    
    ));    
    }
    /**
     * @Route("/editHad/{id}", name="editHad")
    */
    public function edithad($id,HadRepository $hadrepo,Request $request)
    {
        $user= $this->getUser();

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
        return $this->redirectToRoute('listehad');
           
            }
        }

        return $this->render('admin/edithad.html.twig', 
        array('Had' => $hads,
        'user'=>$user
    
    ));    
    }

    /**
     * @Route("/validerhad/{id}", name="validerhad")
    */
    public function validerhad($id,HadRepository $hadrepo,Request $request)
    {
        $user= $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $hads= $hadrepo->findOneBy(['id'=>$id]);
        $hads->setEtat(true);
        $em->persist($hads);
        $em->flush();
                $this->addFlash('info', 'Had  validé avec succes.');
        return $this->redirectToRoute('listehad');
    }

    /**
     * @Route("/validerlivraison/{id}", name="validerlivraison")
    */
    public function validerlivraison($id,LivraisonRepository $livraisonrepo,Request $request)
    {
        $user= $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $livraison= $livraisonrepo->findOneBy(['id'=>$id]);
        $livraison->setEtat(true);
        $em->persist($livraison);
        $em->flush();
                $this->addFlash('info', 'Livraison  validé avec succes.');
        return $this->redirectToRoute('listelivraison');
    }
    /**
     * @Route("/validervsl/{id}", name="validervsl")
    */
    public function validervsl($id,VslRepository $vslrepo,Request $request)
    {
        $user= $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $vsl= $vslrepo->findOneBy(['id'=>$id]);
        $vsl->setEtat(true);
        $em->persist($vsl);
        $em->flush();
                $this->addFlash('info', 'Vsl  validé avec succes.');
        return $this->redirectToRoute('listevsl');
    }
/**
     * @Route("/validerrv/{id}", name="validerrv")
    */
    public function validerrv($id,PriseDeRendezvousRepository $rvrepo,Request $request)
    {

        $user= $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $rv= $rvrepo->findOneBy(['id'=>$id]);
        $rv->setEtat(true);
        $em->persist($rv);
        $em->flush();
                $this->addFlash('info', 'Rendez Vous  validé avec succes.');
        return $this->redirectToRoute('listeprv');
    }
 
    

   /**
    * @Route("/delete/{id}", requirements={"id": "\d+"}, name="delete")
    * @Method({"GET"})
    */
    public function deleteHad(Request $request, Had $had): Response
    {

        $em = $this->getDoctrine()->getManager();
        $user= $this->getUser();
        $em ->remove($had);
        $em ->flush();
        $this->addFlash('info', 'had deleted');
        return $this->redirectToRoute('listehad');
    }

    /**
     * @Route("/listevsl", name="listevsl")
     */
    public function listevsl()
    {
        $user=$this->getUser();

        $vsls = $this->getDoctrine()->getRepository(Vsl::Class)->findAll();

        return $this->render('admin/listevsl.html.twig',array('vsl'=>$vsls,
        'users'=>$user,
        'user'=>$user
    )); 
  }
   /**
    * @Route("/deletevsl/{id}", requirements={"id": "\d+"}, name="deletevsl")
    * @Method({"GET"})
    */
    public function deleteVsl(Request $request, Vsl $vsl): Response
    {
        $user= $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $em ->remove($vsl);
        $em ->flush();
        $this->addFlash('info', ' vsl deleted');
        return $this->redirectToRoute('listevsl');
    }
  /**
     * @Route("/listelivraison", name="listelivraison")
     */
    public function listelivraison()
    {
        $user=$this->getUser();

        $livraisons = $this->getDoctrine()->getRepository(Livraison::Class)->findAll();
        foreach ($livraisons as $value) {
            $value->setOrdonnance(base64_encode(stream_get_contents($value->getOrdonnance())));
        }

        return $this->render('admin/listelivraison.html.twig',
        array('livraison'=>$livraisons,'user'=>$user)); 
    }
    /**
     * @Route("/viewOrdonnance/{id}", name="viewOrdonnance")
     */
    public function viewOrdonnance($id)
    {
        $user= $this->getUser();

        $livraison = $this->getDoctrine()->getRepository(Livraison::Class)->findOneBy(['id'=>$id]);
            $livraison->setOrdonnance(base64_encode(stream_get_contents($livraison->getOrdonnance())));
        

     $html = $this->render('admin/ordonnancefile.html.twig', array('file' => $livraison->getOrdonnance(),
     'user'=>$user
    ));
   /*  $snappy = $this->get('knp_snappy.pdf');

$output= "Ordonnance";
    // Generate PDF file
    return new Response(
        $snappy->getOutputFromHtml($html),
        200,
        array(
            'Content-Type'          => 'application/pdf',
            'Content-Disposition'   => 'inline; filename="'.$output.'.pdf"'
        )
    ); */
return $html;
    }
     /**
    * @Route("/deleteadminlivraison/{id}", requirements={"id": "\d+"}, name="deleteadminlivraison")
    * @Method({"GET"})
    */
    public function deletelivraison(Request $request, Livraison $livraison): Response
    {
        $user= $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $em ->remove($livraison);
        $em ->flush();
        $this->addFlash('info', ' livraison deleted');
        return $this->redirectToRoute('listelivraison');
    }

    /**
     * @Route("/livraisonedit/{id}", name="livraisonedit")
    */
    public function livraisonedit($id,LivraisonRepository $livraisonrepo,Request $request)
    {
        $user= $this->getUser();

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
        return $this->redirectToRoute('listelivraison');
           
            }
        }

        return $this->render('admin/livraisonedit.html.twig', 
        array('Livraison' => $livraisons,
    
        'user'=>$user
    ));    
    }
    /**
     * @Route("/vsledit/{id}", name="vsledit")
    */
    public function vsledit($id,VslRepository $vslrepo,Request $request)
    {
        $user= $this->getUser();

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
        return $this->redirectToRoute('listevsl');
           
            }
        }

        return $this->render('admin/listevsledit.html.twig', 
        array('Vsl' => $vsls,
        'user'=>$user
    
    ));    
    }
     /**
     * @Route("/listemedecin", name="listemedecin")
     */
    public function listemedcin(MedecinRepository $medecinrepo)
    {
        $user= $this->getUser();
        
        $medecins= $medecinrepo->findAll();
        foreach($medecins as $values){
            $values->setImage(base64_encode(stream_get_contents($values->getImage())));
        }
        return $this->render('admin/listemedecin.html.twig', 
        array('Medecin' => $medecins,
        'user'=>$user
    
    ));    
    }
    /**
     * @Route("/AddTypeStructure", name="AddTypeStructure")
     */
    public function AddTypeStructure(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user= $this->getUser();
        
        $typestructure= new TypeStructure();
        if(isset($_POST['Ajouter'])){
            if($request->isMethod('POST')){
            extract($_POST);
            $typestructure->setLibelle(strtoupper($libelle));
            $em->persist($typestructure);
            $em->flush();
            $this->addFlash('info', 'Enregistré avec succes.');

            }
            }
        return $this->render('admin/addtypestructure.html.twig',
    [
        'user'=>$user

    ]);    
   
    }
    /**
     * @Route("/AddStructure", name="AddStructure")
     */
    public function AddStructure(Request $request,TypeStructureRepository $typerepo,MedecinRepository $medecinrepo,QuartierRepository $quartierrepo)
    {

        $user= $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $structure= new Structure();
        if(isset($_POST['Ajouter'])){
            if($request->isMethod('POST')){
            extract($_POST);
                $typestructid=$typerepo->findBy(['id'=>$typestructure]);
        $structure->setLibelle($libelle);
        $structure->setEmail($email);
        $structure->setTel($tel);
        $structure->setAdresse($adresse);
        $structure->setLatitude($latitude);
        $structure->setLongitude($longitude);
        $structure->setTypeStructure($typestructid[0]);
        $em->persist($structure);
        $em->flush();
        $this->addFlash('info', 'Enregistré avec succes.');

                }
            }
            return $this->render('admin/addstructure.html.twig',[
            'typesstructures'=>$typerepo->findAll(),
            'medecins'=>$medecinrepo->findAll(),
             'quartiers'=>$quartierrepo->findAll(),
            'user'=>$user

            ]);}
        /**
     * @Route("/editstructure/{id}", name="editstructure")
    */
        public function EditStructure($id,StructureRepository $structrepo,Request $request)
        {
            $em = $this->getDoctrine()->getManager();
    

            $user= $this->getUser();
            $structure= new Structure();
            if(isset($_POST['Modifier'])){
                if($request->isMethod('POST')){
                    extract($_POST);
                    $typestructid=$typerepo->findBy(['id'=>$typestructure]);
            $structure->setLibelle($libelle);
            $structure->setEmail($email);
            $structure->setTel($tel);
            $structure->setAdresse($adresse);
            $structure->setLatitude($latitude);
            $structure->setLongitude($longitude);
            $em->persist($structure);
            $em->flush();
            $this->addFlash('info', 'Modifier avec succes.');
    
                    }
                }
                return $this->redirectToRoute('listestructure');
                              
            }
             /**
    * @Route("/deletestructure/{id}", requirements={"id": "\d+"}, name="deletestructure")
    * @Method({"GET"})
    */
    public function deletesrtucture(Request $request, Structure $stucture): Response
    {
        $user= $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $em ->remove($structure);
        $em ->flush();
        $this->addFlash('info', ' structure deleted');
        return $this->redirectToRoute('listestructure');
    }
    /**
     * @Route("/listestructure", name="listestructure")
     */
     public function listestructure(StructureRepository $structurerepo)
     {
        $user= $this->getUser();
        
        $structures= $structurerepo->findAll();
        return $this->render('admin/listestructure.html.twig', [
            'structures'=>$structures,
            'user'=>$user
            
        ]);
 }
 /**
     * @Route("/listetypestructure", name="listetypestructure")
     */
    public function listtypestruct(TypeStructureRepository $typerepo)
    {
       
        $user= $this->getUser();
       $typestructures= $typerepo->findAll();
       return $this->render('admin/listetypestructure.html.twig', [
           'typestructures'=>$typestructures,
           'user'=>$user
           
       ]);
}

}