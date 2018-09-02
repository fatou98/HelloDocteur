<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\UserType;

use App\Entity\User;
use App\Entity\Medecin;
use App\Entity\Patient;
class SecurityController extends Controller
{
    /**
     * @Route("/security", name="security")
     */
    public function index()
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
     /**
     * @Route("/register/{etat}")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder,$etat) {
        // 1) build the form
        $user = new User();
        $medecin= new Medecin();
        $patient= new Patient();

        $form = $this->createForm(UserType::class, $user);
        
        if ($etat=='medecin'){
           
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            //on active par défaut
            $characts = 'abcdefghijklmnopqrstuvwxyz'; 
            $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
            $characts .= '1234567890'; 
            $code_aleatoire = ''; 

            for($i=0;$i < 7;$i++) 
            { 
            $code_aleatoire .=$characts[ rand() % strlen($characts) ]; 
            } 
            $matricule='MD'.$code_aleatoire;
            $user->setIsActive(true);
           
            $user->addRole("ROLE_MEDECIN");
            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $medecin->setMatricule($matricule);
            $medecin->setNomcomplet($user->getNomcomplet());
            $medecin->setEmail($user->getEmail());
            $medecin->setTel($user->getTel());
            $medecin->setAdresse($user->getAdresse());

            $entityManager->persist($medecin);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->redirectToRoute('accueil');
            $this->addFlash('success', 'Votre compte à bien été enregistré.');
            //return $this->redirectToRoute('login');
        }
        }
            
        else if ($etat=='admin'){
     
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            //on active par défaut
            $user->setIsActive(true);
           
            $user->addRole("ROLE_ADMIN");
            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->redirectToRoute('admin');

            $this->addFlash('success', 'Votre compte à bien été enregistré.');
            //return $this->redirectToRoute('login');
        }
        }
        
        else if ($etat=='patient'){
     
            // 2) handle the submit (will only happen on POST)
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // 3) Encode the password (you could also do this via Doctrine listener)
                $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);
                //on active par défaut
                $user->setIsActive(true);
               
                $user->addRole("ROLE_PATIENT");
                // 4) save the User!
                $this->redirectToRoute('patient');

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                $patient->setNomcomplet($user->getNomcomplet());
            $patient->setEmail($user->getEmail());
            $patient->setTel($user->getTel());
            $patient->setAdresse($user->getAdresse());

            $entityManager->persist($patient);
            $entityManager->flush();
                // ... do any other work - like sending them an email, etc
                // maybe set a "flash" success message for the user
                $this->addFlash('success', 'Votre compte à bien été enregistré.');
                //return $this->redirectToRoute('login');
            }
            }

        else if ($etat=='pharmacie'){
     
            // 2) handle the submit (will only happen on POST)
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // 3) Encode the password (you could also do this via Doctrine listener)
                $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);
                //on active par défaut
                $user->setIsActive(true);
               
                $user->addRole("ROLE_PHARMACIE");
                // 4) save the User!
                //$this->redirectToRoute('patient');

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                /*$patient->setNomcomplet($user->getNomcomplet());
            $patient->setEmail($user->getEmail());
            $patient->setTel($user->getTel());
            $patient->setAdresse($user->getAdresse());

            $entityManager->persist($patient);
            $entityManager->flush();*/
                // ... do any other work - like sending them an email, etc
                // maybe set a "flash" success message for the user
                $this->addFlash('success', 'Votre compte à bien été enregistré.');
                //return $this->redirectToRoute('login');
            }
            }
       
        return $this->render('security/register.html.twig', ['form' => $form->createView(), 'mainNavRegistration' => true, 'title' => 'Inscription']);

}


/**
     * @Route("/register/admin/medecin")
     */
    public function registerAdminAction(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
        // 1) build the form
        $user = new User();
        $medecin= new Medecin();
        $patient= new Patient();

        $form = $this->createForm(UserType::class, $user);
    
           
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user,'passer');
            $user->setPassword($password);
            //on active par défaut
            $characts = 'abcdefghijklmnopqrstuvwxyz'; 
            $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
            $characts .= '1234567890'; 
            $code_aleatoire = ''; 

            for($i=0;$i < 7;$i++) 
            { 
            $code_aleatoire .=$characts[ rand() % strlen($characts) ]; 
            } 
            $matricule='MD'.$code_aleatoire;
            $user->setIsActive(true);
           
            $user->addRole("ROLE_MEDECIN");
            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $medecin->setMatricule($matricule);
            $medecin->setNomcomplet($user->getNomcomplet());
            $medecin->setEmail($user->getEmail());
            $medecin->setTel($user->getTel());
            $medecin->setAdresse($user->getAdresse());

            $entityManager->persist($medecin);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->redirectToRoute('accueil');
            $this->addFlash('success', 'Le compte à bien été enregistré.');
            //return $this->redirectToRoute('login');
        }
    
        return $this->render('security/registeradmin.html.twig', ['form' => $form->createView(), 'mainNavRegistration' => true, 'title' => 'Inscription']);

}
/**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils) {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $form = $this->get('form.factory')
                ->createNamedBuilder(null)
                ->add('_username', null, ['label' => 'Email'])
                ->add('_password', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class, ['label' => 'Mot de passe'])
                ->add('ok', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class, ['label' => 'Ok', 'attr' => ['class' => 'btn-success btn-block']])
                ->getForm();
        return $this->render('security/login.html.twig', [
                    'mainNavLogin' => true, 'title' => 'Connexion',
                    'form' => $form->createView(),
                    'last_username' => $lastUsername,
                    'error' => $error,
        ]);
    }

}

