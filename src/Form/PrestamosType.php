<?php

namespace App\Form;

use App\Entity\Prestamos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestamosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Fecha_Prestamo')
            ->add('Fecha_Devolucion')
            ->add('Estado_Prestamo')
            ->add('id_Usuario')
            ->add('id_Bibliotecario')
            ->add('Id_Material')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestamos::class,
        ]);
    }
}
