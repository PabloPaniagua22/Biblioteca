<?php

namespace App\Form;

use App\Entity\Librarian;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LibrarianType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nombre')
            ->add('Apellido')
            ->add('Direccion')
            ->add('Telefono')
            ->add('Correo_Electronico')
            ->add('Fecha_Contratacion')
            ->add('turno_Trabajo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Librarian::class,
        ]);
    }
}
