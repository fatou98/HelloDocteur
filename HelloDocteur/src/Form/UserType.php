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
        ->add('email',EmailType::class, ['label' => 'Email','attr'=>['class'=>'gui-input','placeholder'=>'Entrer votre email','style'=>'margin-bottom:20px;font-size:16px;']])
        ->add('nomcomplet',TextType::class, ['label' => 'Nom complet','attr'=>['class'=>'gui-input','placeholder'=>'Entrer votre nomcomplet','style'=>'margin-bottom:20px;font-size:16px;']])
        ->add('login',TextType::class, ['label' => 'Login','attr'=>['class'=>'gui-input','placeholder'=>'Entrer votre login','style'=>'margin-bottom:20px;font-size:16px;']])
        ->add('Numpiece',NumberType::class, ['label' => 'Numpiéce','attr'=>['class'=>'gui-input','placeholder'=>'Entrer votre CNI', 'style'=>'margin-bottom:20px;font-size:16px;']])
        ->add('adresse',TextType::class, ['label' => 'Adresse','attr'=>['class'=>'gui-input','placeholder'=>'Entrer votre adresse complete','style'=>'margin-bottom:20px;font-size:16px;']])
        ->add('Tel',NumberType::class, ['label' => 'Téléphone','attr'=>['class'=>'gui-input','placeholder'=>'Entrer votre numero de téléphone','style'=>'margin-bottom:20px;font-size:16px;']])
        ->add('plainPassword', RepeatedType::class, array(
            'type' => PasswordType::class,
            'first_options' => array('label' => 'Mot de passe','attr'=>['class'=>'gui-input','placeholder'=>'Entrer votre password','style'=>'margin-bottom:20px;font-size:16px;']),
            'second_options' => array('label' => 'Confirmation du mot de passe','attr'=>['class'=>'gui-input','placeholder'=>'Confirmez votre mot de passe','style'=>'margin-bottom:20px;font-size:16px;']),
        ))

        ->add('submit', SubmitType::class, ['label'=>'Envoyer', 'attr'=>['class'=>'button btn-primary mr10 pull-right']]);        }

  

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
