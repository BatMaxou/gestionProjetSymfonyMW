<?php

namespace App\Form;

use App\Entity\Host;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class HostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'hébergeur',
                'required' => true,
            ])
            ->add('code', TextType::class, [
                'label' => 'Code interne généré automatiquement',
                'disabled' => true,
            ])
            ->add('notes', TextareaType::class, [
                'label' => 'Notes ou remarques',
                'required' => false,
            ])
            ->add('reset', ResetType::class, [
                'label' => 'Annuler l\'ajouter l\'hébergeur',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter l\'hébergeur',
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Host::class,
        ]);
    }
}