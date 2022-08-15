<?php

namespace App\Form\FormPAI;

use App\Entity\EntityPAI\ParereMMG;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParereMMGFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('parere', ChoiceType::class, [
                'choices'  => [
                    'favorevole' => 'Favorevole',
                    'contrario' => 'Contrario',
                ]])
            ->add('descrizione')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParereMMG::class,
        ]);
    }
}
