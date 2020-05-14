<?php

namespace App\Form;

use App\Entity\Gamme;
use App\Entity\Marque;
use App\Entity\Media;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('reference')
            ->add('descriptif')
            ->add('application')
            ->add('media', EntityType::class, array(
                'class' => Media::class,
                'required' => false,
                'label' => 'Medias',
                'choice_label' => 'nom',
                'multiple' => false))
            ->add('marques', EntityType::class, array(
                'class' => Marque::class,
                'required' => true,
                'label' => 'Marques',
                'choice_label' => 'nom',
                'multiple' => false))
            ->add('gammes', EntityType::class, array(
                'class' => Gamme::class,
                'required' => true,
                'label' => 'Gammes',
                'choice_label' => 'nom',
                'multiple' => false))
                ->add('statut')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
