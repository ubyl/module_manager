<?php

namespace App\Form\FormPAI;

use App\Doctrine\DBAL\Type\TipoOperatore;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\EntityPAI\ValutazioneFiguraProfessionale;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ValutazioneFiguraProfessionaleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $TipoOperatore = new TipoOperatore();
        $operatoreChoices = $TipoOperatore->getValues();

        $builder
            ->add('nome')
            ->add('tipoOperatore', ChoiceType::class,[
                'choices' => $operatoreChoices
            ])
            ->add('diagnosiProfessionale')
            ->add('obbiettiviDaRaggiungere')
            ->add('tipoEFrequenza')
            ->add('modalitaTempiMonitoraggio')
            ->add('dataValutazione', DateType::class,[
                'widget' => 'single_text',  
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ValutazioneFiguraProfessionale::class,
        ]);
    }
}
