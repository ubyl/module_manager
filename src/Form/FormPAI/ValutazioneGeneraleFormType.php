<?php

namespace App\Form\FormPAI;

use App\Entity\EntityPAI\AltraTipologiaAssistenza;
use App\Entity\EntityPAI\Bisogni;
use Symfony\Component\Form\AbstractType;
use App\Entity\EntityPAI\ValutazioneGenerale;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ValutazioneGeneraleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('data_valutazione')
            ->add('tipologia_valutazione')
            ->add('n_componenti_nucleo_abitativo')
            ->add('panf')
            ->add('fanf')
            ->add('iss')
            ->add('altra_tipologia_assistenza', EntityType::class,[
                'class'=> AltraTipologiaAssistenza::class,
                'expanded'=> true,
                'multiple'=> true,
            ])
            ->add('uso_servizi_igenici')
            ->add('abbigliamento')
            ->add('alimentazione')
            ->add('indicatore_deambulazione')
            ->add('igene_personale')
            ->add('rischio_infettivo')
            ->add('cognitivita')
            ->add('comportamento')
            ->add('diagnosi')
            ->add('bisogni', EntityType::class,[
                'class'=> Bisogni::class,
                'expanded'=> true,
                'multiple'=> true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ValutazioneGenerale::class,
        ]);
    }
}
