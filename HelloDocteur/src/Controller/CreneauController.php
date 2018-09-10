<?php

namespace App\Controller;

use App\Entity\Creneau;
use App\Form\CreneauType;
use App\Repository\MedecinRepository;

use App\Repository\CreneauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/creneau")
 */
class CreneauController extends AbstractController
{
    /**
     * @Route("/", name="creneau_index", methods="GET")
     */
    public function index(CreneauRepository $creneauRepository,MedecinRepository $medecinrepo): Response
    { $usermedecin= $this->getUser();
        $emailmedecin=$usermedecin->getEmail();
        $medecinloggedIn=$medecinrepo->findBy(['Email'=>$emailmedecin]);
       
        return $this->render('creneau/index.html.twig', ['creneaus' => $creneauRepository->findAll(),'medecinloggedIn'=>$medecinloggedIn]);
    }

    /**
     * @Route("/new", name="creneau_new", methods="GET|POST")
     */
    public function new(Request $request,MedecinRepository $medecinrepo): Response
    {
        $creneau = new Creneau();
        $form = $this->createForm(CreneauType::class, $creneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creneau);
            $em->flush();

            return $this->redirectToRoute('creneau_index');
        }
        $usermedecin= $this->getUser();
        $emailmedecin=$usermedecin->getEmail();
        $medecinloggedIn=$medecinrepo->findBy(['Email'=>$emailmedecin]);
       
        return $this->render('creneau/new.html.twig', [
            'creneau' => $creneau,
            'form' => $form->createView(),
            'medecinloggedIn'=>$medecinloggedIn
        ]);
    }

    /**
     * @Route("/{id}", name="creneau_show", methods="GET")
     */
    public function show(Creneau $creneau,MedecinRepository $medecinrepo): Response
    {
        $usermedecin= $this->getUser();
        $emailmedecin=$usermedecin->getEmail();
        $medecinloggedIn=$medecinrepo->findBy(['Email'=>$emailmedecin]);
       
        return $this->render('creneau/show.html.twig', ['creneau' => $creneau,'medecinloggedIn'=>$medecinloggedIn]);
    }

    /**
     * @Route("/{id}/edit", name="creneau_edit", methods="GET|POST")
     */
    public function edit(Request $request, Creneau $creneau,MedecinRepository $medecinrepo): Response
    {
        $form = $this->createForm(CreneauType::class, $creneau);
        $form->handleRequest($request);
        $usermedecin= $this->getUser();
        $emailmedecin=$usermedecin->getEmail();
        $medecinloggedIn=$medecinrepo->findBy(['Email'=>$emailmedecin]);
       
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('creneau_edit', ['id' => $creneau->getId()]);
        }

        return $this->render('creneau/edit.html.twig', [
            'creneau' => $creneau,
            'form' => $form->createView(),
            'medecinloggedIn'=>$medecinloggedIn
        ]);
    }

    /**
     * @Route("/{id}", name="creneau_delete", methods="DELETE")
     */
    public function delete(Request $request, Creneau $creneau,MedecinRepository $medecinrepo): Response
    {
        $usermedecin= $this->getUser();
        $emailmedecin=$usermedecin->getEmail();
        $medecinloggedIn=$medecinrepo->findBy(['Email'=>$emailmedecin]);
       
        if ($this->isCsrfTokenValid('delete'.$creneau->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($creneau);
            $em->flush();
        }

        return $this->redirectToRoute('creneau_index');
    }
}
