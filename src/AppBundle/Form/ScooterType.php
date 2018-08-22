<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use AppBundle\Entity\ScooterModel;

class ScooterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', TextType::class, array('label' => 'Référence'))
            ->add('model', EntityType::class, array(
                'class' => ScooterModel::class,
                'choice_label' => 'nameModel',
                'label' => 'Modèle'
            ))
            ->add('matriculation',TextType::class, array('label' => 'Immatriculation'))
            ->add('kilometers',TextType::class, array('label' => 'Kilomètres'))
            ->add('color',TextType::class, array('label' => 'Couleur'))
            ->add('serialNumber', TextType::class, array('label' => 'N° de Série'))
            ->add('price', TextType::class, array('label' => 'Prix'))
            ->add('image', FileType::class, array(
                'label' => 'Image (jpeg, png, jpg)',
                'data_class' => null
            ));
    }
}
