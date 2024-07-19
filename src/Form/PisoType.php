<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Piso;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PisoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description',TextareaType::class, [
                'label' =>'Descripción'
            ])
            ->add('price',TextareaType::class, [
                'label' =>'Precio'
            ])
            ->add('includes',TextareaType::class, [
                'label' =>'Incluye',
                'attr' => [
                    'placeholder' => 'Garaje, Trastero'
                ]
            ])
            ->add('rooms',TextareaType::class, [
                'label' =>'Habitaciones'
            ])
            ->add('size',TextareaType::class, [
                'label' =>'Tamaño'
            ])
            ->add('floor',TextareaType::class, [
                'label' =>'Piso'
            ])
            ->add('image',TextareaType::class, [
                'label' =>'URL Imagen'
            ])
            ->add('notes',TextareaType::class, [
                'label' =>'Comentarios'
            ])
            ->add('zone', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'name',
                'multiple' => true,
                
            ])
            ->add('Enviar', SubmitType::class)
            ->add('Resetear', ResetType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Piso::class,
        ]);
    }
}
