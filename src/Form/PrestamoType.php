<?php

namespace App\Form;

use App\Entity\Prestamo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestamoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_Bibliotecario')
            ->add('id_Usuario')
            ->add('id_Material')
            ->add('fecha_Prestamo')
            ->add('fecha_Devolucion')
            ->add('estado_Prestamo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestamo::class,
        ]);
    }
}
