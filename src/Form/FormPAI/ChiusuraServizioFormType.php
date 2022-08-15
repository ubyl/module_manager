<?php

namespace App\Form\FormPAI;

use App\Entity\EntityPAI\ChiusuraServizio;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChiusuraServizioFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('conclusioni')
            ->add('dataValutazione')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ChiusuraServizio::class,
        ]);
    }
}
