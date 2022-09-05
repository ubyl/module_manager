<?php

namespace App\Form\FormPAI;

use App\Entity\EntityPAI\SchedaPAI;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SchedaPAIType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idOperatorePrincipale')
            ->add('idOperatoreSecondarioInf', ChoiceType::class, [
                'multiple' => true,
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ],
                'autocomplete' => true,
                ])
            ->add('idOperatoreSecondarioTdr', ChoiceType::class, [
                'multiple' => true,
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ],
                'autocomplete' => true,
                ])
            ->add('idOperatoreSecondarioLog', ChoiceType::class, [
                'multiple' => true,
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ],
                'autocomplete' => true,
                ])
            ->add('idOperatoreSecondarioAsa', ChoiceType::class, [
                'multiple' => true,
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ],
                'autocomplete' => true,
                ])
            ->add('idOperatoreSecondarioOss', ChoiceType::class, [
                'multiple' => true,
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ],
                'autocomplete' => true,
                ])
            ->add('idAssistito')
            ->add('idConsole')
            ->add('idProgetto')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SchedaPAI::class,
        ]);
    }
}
