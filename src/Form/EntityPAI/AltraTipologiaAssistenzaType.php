<?php

namespace App\Form\EntityPAI;

use App\Entity\EntityPAI\AltraTipologiaAssistenza;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AltraTipologiaAssistenzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('valutazioneGenerale')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AltraTipologiaAssistenza::class,
        ]);
    }
}
