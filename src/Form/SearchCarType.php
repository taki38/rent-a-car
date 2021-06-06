<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchCarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('fuel', ChoiceType::class,[
                'label' => 'Carburant',
                'choices' => [
                    'Diesel' => 'Diesel',
                    'Essence' => 'Essence',
                    'Hybride' => 'Hybride'
                ]
            ])
            ->add('Places', ChoiceType::class,[
                'label' => 'Nb de places',
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                ]
            ])
            ->add('gearBox', ChoiceType::class,[
                'label' => 'Boite Vitesse',
                'choices'  => [
                    'Manuelle' => 'Manuelle',
                    'Automatique' => 'Automatique',
                ]
            ])
            ->add('luggage', ChoiceType::class,[
                'label' => 'Nb de baggages',
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                ]
            ])
            ->add('type', ChoiceType::class,[
                'label' => 'Type',
                'choices' => [
                    'Voiture' => 'Voiture',
                    'Utilitaire' => 'Utilitaire'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
