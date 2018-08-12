<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\CarModel;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // TODO : Jenn => Voir pour mettre le choice_label en input
            ->add('model', EntityType::class, array(
                'class' => CarModel::class,
                'choice_label' => 'nameModel',
                'label' => 'Modèle'
            ))
            ->add('matriculation', TextType::class, array('label' => 'Immatriculation'))
            ->add('kilometers', TextType::class, array('label' => 'KM'))
            ->add('color', TextType::class, array('label' => 'Couleur'))
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
