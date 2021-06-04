<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'Modèle'
            ])
            ->add('fuel', ChoiceType::class,[
                'label' => 'Carburant',
                'choices' => [
                    'Diesel' => 'Diesel',
                    'Essence' => 'Essence',
                    'Hybride' => 'Hybride'
                ]
            ])
            ->add('Places', IntegerType::class,[
                'label' => 'Nombre de places'
            ])
            ->add('gearBox', ChoiceType::class,[
                'label' => 'Boite Vitesse',
                'choices'  => [
                    'Manuelle' => 'Manuelle',
                    'Automatique' => 'Automatique',
                    ]
            ])
            ->add('luggage', IntegerType::class,[
                'label' => 'Nombres de baggages'
            ])
            ->add('type', ChoiceType::class,[
                'label' => 'Type',
                'choices' => [
                    'Voiture' => 'Voiture',
                    'Utilitaire' => 'Utilitaire'
                ]
            ])
            ->add('Image',CarImageType::class,[
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
