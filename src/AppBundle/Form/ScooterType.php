<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ScooterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model',TextType::class, array('label' => 'Modèle'))
            ->add('matriculation',TextType::class, array('label' => 'Immatriculation'))
            ->add('kilometers',TextType::class, array('label' => 'Kilomètres'))
            ->add('color',TextType::class, array('label' => 'Couleur'))
            ->add('serialNumber', TextType::class, array('label' => 'N° de Série'));
        //->add('image', FileType::class, array(
        //'label' => 'Image',
        //'required' => false,
        //'data_class' => null
        //))
        //->add('image', FileType::class, array('label' => 'Image (.jpeg)'))
        //->add('video', FileType::class, array('label' => 'Video (.mp4)'));
    }
}
