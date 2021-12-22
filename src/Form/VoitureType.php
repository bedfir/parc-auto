<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('puissance')
            ->add('couleur')
            ->add('nbPortes')
            ->add('categorie')
            ->add('couleur', ChoiceType::class, [
                'choices'  => [
                    'En rouge' => "rouge",
                    'En blanc' => "blanc",
                    'En noir' => "noir",
                ],
            ])
            ->add(
                'puissance',
                IntegerType::class,
                [
                    'label' => 'Puissance en CV',
                    'attr' => [
                        'min' => 60,
                        'max' => 250
                    ],
                    'help' => 'Puissance comprise entre 60 et 250 CV'
                ]
            )
            ->add('modele');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
