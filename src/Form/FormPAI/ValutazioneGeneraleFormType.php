<?php

namespace App\Form\FormPAI;

use App\Entity\ValutazioneGenerale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ValutazioneGeneraleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('data_valutazione')
            ->add('n_componenti_nucleo_abitativo')
            ->add('rischio_infettivo')
            ->add('diagnosi')
            ->add('firma_operatore')
            ->add('tipologia_valutazione')
            ->add('panf')
            ->add('fanf')
            ->add('iss')
            ->add('uso_servizi_igenici')
            ->add('abbigliamento')
            ->add('alimentazione')
            ->add('indicatore_deambulazione')
            ->add('igene_personale')
            ->add('cognitività')
            ->add('comportamento')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ValutazioneGenerale::class,
        ]);
    }
}
