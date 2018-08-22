<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName',TextType::class, array('label' => 'Nom'))
            ->add('firstName', TextType::class, array('label' => 'Prénom'))
            ->add('birthDate', DateTimeType::class, array('label' => 'Date de Naissance'))
            ->add('address', TextType::class, array('label' => 'Adresse'))
            ->add('mail', EmailType::class, array('label' => 'Email'))
            ->add('phoneNumber', TextType::class, array('label' => 'Téléphone'))
            ->add('driveLicenceNb', TextType::class, array('label' => 'N° de Permis'))
            ->add('plainPassword', RepeatedType::class, array(
               'type' => PasswordType::class,
                'first_options'  => array('label' => 'Mot de passe'),
               'second_options' => array('label' => 'Confirmation du mot de passe'),
            ));
        //->add('image', FileType::class, array(
        //'label' => 'Image',
        //'required' => false,
        //'data_class' => null
        //))
        //->add('image', FileType::class, array('label' => 'Image (.jpeg)'))
        //->add('video', FileType::class, array('label' => 'Video (.mp4)'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}
