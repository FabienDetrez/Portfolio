<?php

namespace App\Form;

use App\Entity\Gamme;
use App\Entity\Marque;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                'label' => 'Nom ou référence',
                'required' => false
            ))
            ->add('marques', EntityType::class, array(
                'class' => Marque::class,
                'required' => false,
                'choice_label' => 'nom',
            ))
            ->add('gammes', EntityType::class, array(
                'class' => Gamme::class,
                'required' => false,
                'choice_label' => 'nom',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
