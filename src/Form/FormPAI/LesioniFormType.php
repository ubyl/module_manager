<?php

namespace App\Form\FormPAI;

use App\Entity\Lesioni;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LesioniFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dataRivalutazioniSettimanali')
            ->add('tipologiaLesione')
            ->add('numeroSedeLesione')
            ->add('gradoLesione')
            ->add('condizioneLesione')
            ->add('bordiLesione')
            ->add('cutePerilesionale')
            ->add('noteSullaLesione')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lesioni::class,
        ]);
    }
}
