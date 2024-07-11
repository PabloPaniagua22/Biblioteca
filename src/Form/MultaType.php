<?php

namespace App\Form;

use App\Entity\Multa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MultaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_Bibliotecario')
            ->add('id_Usuario')
            ->add('id_Prestamo')
            ->add('Monto')
            ->add('fecha_Emision')
            ->add('estado_Pago')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Multa::class,
        ]);
    }
}
