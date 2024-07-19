<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Piso;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PisoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description')
            ->add('price')
            ->add('includes')
            ->add('rooms')
            ->add('size')
            ->add('floor')
            ->add('image')
            ->add('notes')
            ->add('zone', EntityType::class, [
                'class' => Location::class,
'choice_label' => 'name',
'multiple' => true,
            ])
            ->add('Enviar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Piso::class,
        ]);
    }
}
