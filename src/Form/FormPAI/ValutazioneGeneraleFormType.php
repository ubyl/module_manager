<?php

namespace App\Form\FormPAI;

use App\Doctrine\DBAL\Type\ISS;
use App\Doctrine\DBAL\Type\FANF;
use App\Doctrine\DBAL\Type\PANF;
use App\Entity\EntityPAI\Bisogni;
use App\Doctrine\DBAL\Type\Disturbi;
use App\Doctrine\DBAL\Type\Autonomia;
use App\Doctrine\DBAL\Type\Valutazione;
use Symfony\Component\Form\AbstractType;
use App\Entity\EntityPAI\ValutazioneGenerale;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\EntityPAI\AltraTipologiaAssistenza;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ValutazioneGeneraleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $Valutazione = new Valutazione();
        $valutazioneChoices = $Valutazione->getValues();
        $PANF = new PANF();
        $panfChoices = $PANF->getValues();
        $FANF = new FANF();
        $fanfChoices = $FANF->getValues();
        $ISS = new ISS();
        $issChoices = $ISS->getValues();
        $Autonomia = new Autonomia();
        $autonomiaChoices = $Autonomia->getValues();
        $Disturbi = new Disturbi();
        $disturbiChoices = $Disturbi->getValues();
        

        $builder
            ->add('nome')
            ->add('data_valutazione')
            ->add('tipologia_valutazione', ChoiceType::class,[
                'choices' => $valutazioneChoices
            ])
            
            ->add('n_componenti_nucleo_abitativo')
            ->add('panf', ChoiceType::class,[
                'choices' => $panfChoices
            ])
            
            ->add('fanf', ChoiceType::class,[
                'choices' => $fanfChoices
            ])
            
            ->add('iss', ChoiceType::class,[
                'choices' => $issChoices
            ])
            
            ->add('altra_tipologia_assistenza', EntityType::class,[
                'class'=> AltraTipologiaAssistenza::class,
                'expanded'=> true,
                'multiple'=> true,
            ])
            ->add('uso_servizi_igenici', ChoiceType::class,[
                'choices' => $autonomiaChoices
            ])
            
            ->add('abbigliamento', ChoiceType::class,[
                'choices' => $autonomiaChoices
            ])
            
            ->add('alimentazione', ChoiceType::class,[
                'choices' => $autonomiaChoices
            ])
            
            ->add('indicatore_deambulazione', ChoiceType::class,[
                'choices' => $autonomiaChoices
            ])
            
            ->add('igene_personale', ChoiceType::class,[
                'choices' => $autonomiaChoices
            ])
            
            ->add('rischio_infettivo')
            ->add('cognitivita',ChoiceType::class,[
                'choices' => $disturbiChoices
            ])
            ->add('comportamento', ChoiceType::class,[
                'choices' => $disturbiChoices
            ])
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
