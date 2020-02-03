<?php

namespace App\Form;

use App\Entity\DocumentSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DocumentSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('documentType', ChoiceType::class,[
                'label' => 'Type du Document : ',
                'choices' => [
                    'Plan'=>'7',
                    'Texte'=>'8',
                    'Inconnu'=>'9'
                ]
            ] )
            ->add('searchedText', TextType::class, [
                'label'=>'Recherche par mot-clés : ',
                'attr'=>[
                    'placeholder'=>'Mot-clés recherchés'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DocumentSearch::class,
            'method'=>'get',
            'csrf_protection'=>false,
        ]);
    }
}