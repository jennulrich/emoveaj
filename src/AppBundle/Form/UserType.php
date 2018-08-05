<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName',TextType::class, array('label' => 'Nom'))
            ->add('firstName', TextType::class, array('label' => 'Prénom'))
            ->add('birthDate', DateTimeType::class, array('label' => 'Date de Naissance'))
            ->add('address', TextType::class, array('label' => 'Adresse'))
            ->add('mail', TextType::class, array('label' => 'Email'))
            ->add('driveLicenceNb', TextType::class, array('label' => 'N° de Permis'));
        //->add('image', FileType::class, array(
        //'label' => 'Image',
        //'required' => false,
        //'data_class' => null
        //))
        //->add('image', FileType::class, array('label' => 'Image (.jpeg)'))
        //->add('video', FileType::class, array('label' => 'Video (.mp4)'));
    }
}
