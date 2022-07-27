<?php

namespace App\Form\FormPAI;

use App\Entity\Vas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VasFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('paziente')
            ->add('data')
            ->add('ora')
            ->add('base2')
            ->add('pz')
            ->add('esito')
            ->add('rilevanzaMonitoraggio')
            ->add('firmaSanitario')
            ->add('trattamento')
            ->add('schedaPAI')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vas::class,
        ]);
    }
}
