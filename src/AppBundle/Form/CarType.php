<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model',TextType::class, array('label' => 'Modèle'))
            ->add('color', TextType::class, array('label' => 'Couleur'));
            //->add('image', FileType::class, array(
                //'label' => 'Image',
                //'required' => false,
                //'data_class' => null
            //))
        //->add('image', FileType::class, array('label' => 'Image (.jpeg)'))
        //->add('video', FileType::class, array('label' => 'Video (.mp4)'));
    }
}
