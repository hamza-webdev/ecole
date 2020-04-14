<?php

namespace App\Form;

use App\Entity\ParentPereMere;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParentPereMereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name_p1')
            ->add('prenom_p1')
            ->add('email_p1')
            ->add('telephone_p1')
            ->add('name_p2')
            ->add('prenom_p2')
            ->add('email_p2')
            ->add('telephone_p2')
            ->add('sexe_p1')
            ->add('civilite')
            ->add('user')
            ->add('sexe_p2')
            ->add('adresse_p2')
            ->add('civilite_p2')
            ->add('situation_Familiale')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ParentPereMere::class,
        ]);
    }
}