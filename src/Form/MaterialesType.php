<?php

namespace App\Form;

use App\Entity\Materiales;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterialesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titulo')
            ->add('Autor')
            ->add('Editorial')
            ->add('Fecha_Publicacion')
            ->add('Nro_Ejemplares')
            ->add('Ubicacion')
            ->add('Tipo')
            ->add('Categoria')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Materiales::class,
        ]);
    }
}
