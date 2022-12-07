<?php

namespace App\Form;

use App\Entity\Paziente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PazienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('cognome')
            ->add('codiceFiscale')
            ->add('indirizzo')
            ->add('comune')
            ->add('provincia')
            ->add('cap')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paziente::class,
        ]);
    }
}
