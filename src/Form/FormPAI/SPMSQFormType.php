<?php

namespace App\Form\FormPAI;

use App\Entity\SPMSQ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SPMSQFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('dataValutazione')
            ->add('giornoOggi')
            ->add('giornoSettimana')
            ->add('posto')
            ->add('indirizzo')
            ->add('anni')
            ->add('dataNascita')
            ->add('presidenteAttuale')
            ->add('presidentePrecedente')
            ->add('cognomeMadre')
            ->add('sottrazione')
            ->add('totale')
            ->add('firmaOperatore')
            ->add('schedaPAI')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SPMSQ::class,
        ]);
    }
}
