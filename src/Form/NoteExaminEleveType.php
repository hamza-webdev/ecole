<?php

namespace App\Form;

use App\Entity\Classeroom;
use App\Entity\Eleve;
use App\Entity\Examin;
use App\Entity\MatiereCour;
use App\Entity\NoteExaminEleve;
use App\Entity\Proffesseur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;


class NoteExaminEleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note')
            ->add('examin', EntityType::class, [
                'class' => Examin::class,
                'placeholder' => 'selectionnez examin'
            ])
            ->add('matiere_cour', EntityType::class, [
                'class' => MatiereCour::class,
                'placeholder' => 'Selectionnez un cour'
            ])
            ->add('proffesseur', EntityType::class, [
                'class' => Proffesseur::class,
                'placeholder' => 'Selectionner un prof'
            ])
            ->add('classeroom', EntityType::class, [
                'class' => Classeroom::class,
                'placeholder' => 'Choisissez une classe',
                'required' => false
            ])
        ;
        $builder->get('classeroom')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event){
                $form = $event->getForm();
                $form->getParent()->add('eleve', EntityType::class, [
                    'class' => Eleve::class,
                    'placeholder' => ' Choix eleve',
                    'required' => true,
                    'choices' => $form->getData()->getEleves()
                ]);
            }

        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NoteExaminEleve::class,
        ]);
    }
}
