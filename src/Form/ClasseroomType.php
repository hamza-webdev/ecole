<?php

namespace App\Form;

use App\Entity\Classeroom;
use App\Entity\Examin;
use App\Entity\MatiereCour;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseroomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'placeholder' => 'Saisir un titre'
                ]
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'placeholder' => 'Saisir un description'
                ]
            ])
//            ->add('matiereCours', EntityType::class, [
//                'class' => MatiereCour::class,
//                'placeholder' => 'selectionnez une matiére'
//            ])
//            ->add('examins', EntityType::class, [
//                'class' => Examin::class,
//                'placeholder' => 'Choisissez un examin'
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Classeroom::class,
        ]);
    }
}
