<?php

namespace App\Form\FormPAI;

use App\Entity\ValutazioneFiguraProfessionale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ValutazioneFiguraProfessionaleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('operatore')
            ->add('tipoOperatore')
            ->add('diagnosiProfessionale')
            ->add('obbiettiviDaRaggiungere')
            ->add('tipoEFrequenza')
            ->add('modalitàTempiMonitoraggio')
            ->add('dataValutazione')
            ->add('firmaOperatore')
            ->add('schedaPAI')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ValutazioneFiguraProfessionale::class,
        ]);
    }
}
