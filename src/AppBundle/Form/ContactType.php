<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Nom'
                )
            ))
            ->add('email', TextType::class, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'E-mail'
                )
            ))
            ->add('phone', TextType::class, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Numéro de téléphone'
                )
            ))
            ->add('subject',TextType::class, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Sujet'
                )
            ))
            ->add('message',TextareaType::class, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Votre message...'
                )
            ));
    }
}
