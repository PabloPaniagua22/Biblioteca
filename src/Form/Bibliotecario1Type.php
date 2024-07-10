<?php

namespace App\Form;

use App\Entity\Bibliotecario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Bibliotecario1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nombre')
            ->add('Direccion')
            ->add('Telefono')
            ->add('Correo_electronico')
            ->add('Fecha_Contratacion')
            ->add('Turno_Trabajo')
            ->add('Apellido')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bibliotecario::class,
        ]);
    }
}
