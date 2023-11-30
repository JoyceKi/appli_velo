<?php

namespace App\Form;

use App\Entity\Velo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InscriptionVeloType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque', TextType::class)
            ->add('modele', TextType::class)
            ->add('num_serie', TextType::class)
            ->add('date_achat', DateType::class)
            ->add('couleur', TextType::class)
            ->add('type_velo', TextType::class)
            ->add('fonctionnement', TextType::class)
            // ->add('photo', FileType::class, [
            //     'label' => 'Photo (JPEG or PNG file)',
            //     'mapped' => false, // Ne pas associer automatiquement au champ de l'entité
            //     'required' => false,
            // ])
            // ->add('document', FileType::class)
            ->add('envoyer', SubmitType ::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Velo::class,
        ]);
    }
}
