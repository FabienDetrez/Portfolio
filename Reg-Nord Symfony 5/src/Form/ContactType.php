<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class, array(
                'label'=> 'Prénom',
                'attr' => array(
                    'placeholder'=> 'Votre prénom...'
                )

            ))
            ->add('nom', TextType::class,  array(
                'label'=> 'Nom',
                'attr' => array(
                    'placeholder' => 'Votre nom...'
                )
            ))
            ->add('email', TextType::class, array(
                'label'=> 'E-mail',
                'attr' => array(
                    'placeholder' => 'Votre e-mail...'
                )
            ))
            ->add('message', TextareaType::class, array(
                'label'=> 'Votre message'
            ))
            ->add('sujet')
            ->add('entreprise', TextType::class, array(
                'label'=> 'Entreprise',
                'attr' => array(
                    'placeholder'=> 'Votre entreprise...'
                    )
            ))
            ->add('telephone')
//            ->add('dateEnvoi', DateType::class, array(
//                'widget'=> 'single_text'
//            ))
//            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'translation_domain' => 'forms'
        ]);
    }
}
