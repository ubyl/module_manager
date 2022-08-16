<?php

namespace App\Form\FormPAI;

use App\Entity\EntityPAI\Barthel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BarthelFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('dataValutazione')
            ->add('alimentazione')
            ->add('bagnoDoccia')
            ->add('igienePersonale')
            ->add('abbigliamento')
            ->add('continenzaIntestinale')
            ->add('continenzaUrinaria')
            ->add('toilet')
            ->add('totaleValutazioneFunzionale')
            ->add('trasferimentoLettoSedia')
            ->add('scale')
            ->add('deambulazione')
            ->add('deambulazioneValida')
            ->add('usoCarrozzina')
            ->add('totale')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Barthel::class,
        ]);
    }
}
