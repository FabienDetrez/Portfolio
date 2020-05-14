<?php

namespace App\Form;

use App\Entity\Media;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('texte')
            ->add('carousel')
            ->add('marquee')
            ->add('produit')            
            ->add('gallerie')
            ->add('imageFile', FileType::class, array(
                'required' => false
            ))
            ->add('produits', EntityType::class, array(
                'class' => Produit::class,
                'required' => false,
                'choice_label' => 'nom',
                'label' => 'Liste des produits',
                'multiple' => false
            ))
            ->add('statut')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }
}
