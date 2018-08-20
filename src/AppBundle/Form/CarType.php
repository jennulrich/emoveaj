<?php

namespace AppBundle\Form;

use AppBundle\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use AppBundle\Entity\CarModel;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', TextType::class, array('label' => 'Référence'))
            // TODO : Jenn => Voir pour mettre le choice_label en input
            ->add('model', EntityType::class, array(
                'class' => CarModel::class,
                'choice_label' => 'nameModel',
                'label' => 'Modèle'
            ))
            ->add('matriculation', TextType::class, array('label' => 'Immatriculation'))
            ->add('kilometers', TextType::class, array('label' => 'Kilomètre'))
            ->add('color', TextType::class, array('label' => 'Couleur'))
            ->add('serialNumber', TextType::class, array('label' => 'N° de Série'))
            ->add('price', TextType::class, array('label' => 'Prix'))
            ->add('image', FileType::class, array('label' => 'Image (jpeg, png, jpg)'));
            //->add('image', FileType::class, array(
                //'label' => 'Image',
                //'required' => false,
                //'data_class' => null
            //))
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Car::class,
        ));
    }
}
