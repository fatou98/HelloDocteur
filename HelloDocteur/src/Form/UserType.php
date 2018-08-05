<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email',EmailType::class, ['label' => 'Email','attr'=>['class'=>'col-md-6 gui-input','placeholder'=>'Entrer votre email']])
        ->add('nomcomplet',TextType::class, ['label' => 'Nom complet','attr'=>['class'=>'col-md-6 gui-input','placeholder'=>'Entrer votre nomcomplet']])
        ->add('login',TextType::class, ['label' => 'Login','attr'=>['class'=>'col-md-6 gui-input','placeholder'=>'Entrer votre login']])
        ->add('Numpiece',NumberType::class, ['label' => 'Numpiéce','attr'=>['class'=>'col-md-6 gui-input','placeholder'=>'Entrer votre CNI']])
        ->add('adresse',TextType::class, ['label' => 'Adresse','attr'=>['class'=>'gui-input','placeholder'=>'Entrer votre adresse complete']])
        ->add('Tel',NumberType::class, ['label' => 'Téléphone','attr'=>['class'=>'gui-input','placeholder'=>'Entrer votre numero de téléphone']])
        ->add('plainPassword', RepeatedType::class, array(
            'type' => PasswordType::class,
            'first_options' => array('label' => 'Mot de passe','attr'=>['class'=>'gui-input','placeholder'=>'Entrer votre password']),
            'second_options' => array('label' => 'Confirmation du mot de passe','attr'=>['class'=>'gui-input','placeholder'=>'Confirmez votre mot de passe']),
        ))

        ->add('submit', SubmitType::class, ['label'=>'Envoyer', 'attr'=>['class'=>'button btn-primary mr10 pull-right']]);        }

  

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
