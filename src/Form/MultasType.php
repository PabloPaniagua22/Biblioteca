<?php

namespace App\Form;

use App\Entity\Multas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MultasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Monto')
            ->add('Fecha_Emision')
            ->add('Estado_Pago')
            ->add('id_Usuario')
            ->add('id_Bibliotecario')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Multas::class,
        ]);
    }
}
