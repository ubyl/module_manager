<?php

namespace App\Form\FormPAI;

use App\Config\ISS;
use App\Config\FANF;
use App\Config\PANF;
use App\Config\Disturbi;
use App\Config\Autonomia;
use App\Config\Valutazione;
use App\Entity\EntityPAI\Bisogni;
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
        

        $builder
            ->add('nome')
            ->add('data_valutazione')
            ->add('tipologia_valutazione', EnumType::class,
            [
                'class' => Valutazione::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "iniziale":
                            $label = "Valutazione Iniziale";
                            break;
                        case "ordinaria":
                            $label = "Valutazione Ordinaria";
                            break;
                        case "straordinaria":
                            $label = "Valutazione Straordinaria";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?Valutazione $case) {
                    return $case ? $case->name : '';
                }])
            ->add('n_componenti_nucleo_abitativo')
            ->add('panf', ChoiceType::class, [
                'choices' => $panf_choices,])
            ->add('fanf', ChoiceType::class, [
                'choices' => $fanf_choices,])
            ->add('iss', ChoiceType::class, [
                'choices' => $iss_choices,])
            ->add('altra_tipologia_assistenza', EntityType::class,[
                'class'=> AltraTipologiaAssistenza::class,
                'expanded'=> true,
                'multiple'=> true,
            ])
            ->add('uso_servizi_igenici',ChoiceType::class, [
                'choices' => $autonomia_choices,])
            ->add('abbigliamento',ChoiceType::class, [
                'choices' => $autonomia_choices,])
            ->add('alimentazione',ChoiceType::class, [
                'choices' => $autonomia_choices,])
            ->add('indicatore_deambulazione',ChoiceType::class, [
                'choices' => $autonomia_choices,])
            ->add('igene_personale',ChoiceType::class, [
                'choices' => $autonomia_choices,])
            ->add('rischio_infettivo')
            ->add('cognitivita',ChoiceType::class, [
                'choices' => $disturbi_choices,] )
            ->add('comportamento', ChoiceType::class, [
                'choices' => $disturbi_choices,])
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
