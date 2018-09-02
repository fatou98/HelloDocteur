<?php

namespace App\Form;

use App\Entity\Medecin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedecinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Matricule',TextType::class)
            ->add('nomcomplet',TextType::class)
            ->add('Email',TextType::class)
            ->add('Tel',NumberType::class)
            ->add('Adresse',TextType::class)
            ->add('Latitude',NumberType::class)
            ->add('Longitude',NumberType::class)
            ->add('image',BlobType::class)
            ->add('Quartier',Quartier::class)
            ->add('Specialite',Specialite::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medecin::class,
        ]);
    }
}
