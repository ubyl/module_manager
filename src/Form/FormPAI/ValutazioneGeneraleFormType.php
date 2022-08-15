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
use Symfony\Component\Form\Extension\Core\Type\EnumType;


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
                'choice_label' => function ($choice, $key) {
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
            ->add('panf', EnumType::class,
            [
                'class' => PANF::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "presenteConFunzioniCareGiver":
                            $label = "presente con funzione di care giver";
                            break;
                        case "presenteSenzaFunzioniCareGiver":
                            $label = "presente senza funzione di care giver";
                            break;
                        case "nonPresente":
                            $label = "non presente";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?PANF $case) {
                    return $case ? $case->name : '';
                }])
            ->add('fanf', EnumType::class,
            [
                'class' => FANF::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "presenza24":
                            $label = "presenza 24h su 24";
                            break;
                        case "presenzaSaltuaria":
                            $label = "presenza saltuaria a ore nell'arco della settimana";
                            break;
                        case "giorniFeriali":
                            $label = "solo giorni feriali";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?FANF $case) {
                    return $case ? $case->name : '';
                }])
            ->add('iss', EnumType::class,
            [
                'class' => ISS::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "presente":
                            $label = "presente";
                            break;
                        case "presenzaParziale":
                            $label = "presenza parziale e/o temporanea";
                            break;
                        case "nonPresente":
                            $label = "non presente";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?ISS $case) {
                    return $case ? $case->name : '';
                }])
            ->add('altra_tipologia_assistenza', EntityType::class,[
                'class'=> AltraTipologiaAssistenza::class,
                'expanded'=> true,
                'multiple'=> true,
            ])
            ->add('uso_servizi_igenici',EnumType::class,
            [
                'class' => Autonomia::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "autonomo":
                            $label = "autonomo";
                            break;
                        case "parziale":
                            $label = "parzialmente dipendete";
                            break;
                        case "dipendente":
                            $label = "totalmente dipendente";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?Autonomia $case) {
                    return $case ? $case->name : '';
                }])
            ->add('abbigliamento',EnumType::class,
            [
                'class' => Autonomia::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "autonomo":
                            $label = "autonomo";
                            break;
                        case "parziale":
                            $label = "parzialmente dipendete";
                            break;
                        case "dipendente":
                            $label = "totalmente dipendente";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?Autonomia $case) {
                    return $case ? $case->name : '';
                }])
            ->add('alimentazione',EnumType::class,
            [
                'class' => Autonomia::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "autonomo":
                            $label = "autonomo";
                            break;
                        case "parziale":
                            $label = "parzialmente dipendete";
                            break;
                        case "dipendente":
                            $label = "totalmente dipendente";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?Autonomia $case) {
                    return $case ? $case->name : '';
                }])
            ->add('indicatore_deambulazione',EnumType::class,
            [
                'class' => Autonomia::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "autonomo":
                            $label = "autonomo";
                            break;
                        case "parziale":
                            $label = "parzialmente dipendete";
                            break;
                        case "dipendente":
                            $label = "totalmente dipendente";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?Autonomia $case) {
                    return $case ? $case->name : '';
                }])
            ->add('igene_personale',EnumType::class,
            [
                'class' => Autonomia::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "autonomo":
                            $label = "autonomo";
                            break;
                        case "parziale":
                            $label = "parzialmente dipendete";
                            break;
                        case "dipendente":
                            $label = "totalmente dipendente";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?Autonomia $case) {
                    return $case ? $case->name : '';
                }])
            ->add('rischio_infettivo')
            ->add('cognitivita',EnumType::class,
            [
                'class' => Disturbi::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "assenti":
                            $label = "assenti/lievi";
                            break;
                        case "moderati":
                            $label = "moderati";
                            break;
                        case "gravi":
                            $label = "gravi";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?Disturbi $case) {
                    return $case ? $case->name : '';
                }])
            ->add('comportamento', EnumType::class,
            [
                'class' => Disturbi::class,
                'choice_label' => function ($choice, $key, $value) {
                    $label = '';
                    switch ($choice->name) {
                        case "assenti":
                            $label = "assenti/lievi";
                            break;
                        case "moderati":
                            $label = "moderati";
                            break;
                        case "gravi":
                            $label = "gravi";
                            break;
                    }
                    return $label;
                },
                'choice_value' => function (?Disturbi $case) {
                    return $case ? $case->name : '';
                }])
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
