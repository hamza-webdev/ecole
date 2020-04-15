<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                'placeholder' => 'Saisir le nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                'placeholder' => 'Saisir le prenom'
                ]
            ])
            ->add('dateNaissance', DateType::class, [
                'widget' =>'single_text'
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                'placeholder' => 'Saisir un mail valide!'
                ]
            ])
            ->add('telephone', NumberType::class, [
                'attr' => [
                'placeholder' => 'Saisir un téléphone!'
                ]
            ])
            ->add('sexe', NULL, [
                'placeholder' => 'Saisir le sexe!'
            ])
//            ->add('user')
                /*
                ->add('parent_p1_p2', CollectionType::class, [
                'entry_type' => ParentPereMereType::class,
                'entry_options' => [
                    'label' => false
                    ],
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true
            ])
                 */
            ->add('parent_p1_p2', NULL, [
                'help' => 'Si le nom de parent n\'éxiste pas, vous pouvez le creer!',
                'placeholder' => 'Selection un parent',
                'label' => false
            ])
            ->add('classeroom', null, [
                'placeholder' => 'Saisir le nom de la classe'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
