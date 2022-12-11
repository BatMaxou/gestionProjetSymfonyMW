<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du client',
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
                'label' => 'Annuler l\'ajouter du client',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter le client',
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}