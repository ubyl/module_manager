<?php

namespace App\Form\FormPAI;

use App\Entity\Tinetti;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TinettiFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('dataValutazione')
            ->add('equilibrioSeduto')
            ->add('sedia')
            ->add('alzarsi')
            ->add('stazioneEretta')
            ->add('stazioneErettaProlungata')
            ->add('romberg')
            ->add('rombergSensibilizzato')
            ->add('girarsi1')
            ->add('girarsi2')
            ->add('sedersi')
            ->add('totaleEquilibrio')
            ->add('inizioDeambulazione')
            ->add('piedeDx')
            ->add('piedeDx2')
            ->add('piedeSx')
            ->add('piedeSx2')
            ->add('simmetriaPasso')
            ->add('continuitaPasso')
            ->add('traiettoria')
            ->add('tronco')
            ->add('cammino')
            ->add('totaleAndatura')
            ->add('totale')
            ->add('firmaOperatore')
            ->add('schedaPAI')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tinetti::class,
        ]);
    }
}
