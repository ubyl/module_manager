<?php

namespace App\Form\FormPAI;

use App\Entity\Braden;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BradenFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('percezioneSensoriale')
            ->add('umidità')
            ->add('attività')
            ->add('mobilità')
            ->add('nutrizione')
            ->add('frizioneScivolamento')
            ->add('dataValutazione')
            ->add('totale')
            ->add('firmaOperatore')
            ->add('schedaPAI')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Braden::class,
        ]);
    }
}
