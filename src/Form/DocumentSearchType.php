<?php

namespace App\Form;

use App\Entity\DocumentSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DocumentSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $tab = ['Sélectionner un document'=>null];
        foreach($options['categories'] as $category)
        {
            $tab[$category->getName()] = $category->getId();
        }
        $builder
            ->add('documentType', ChoiceType::class, [
                'choices'=>$tab,
                'label' => 'Type de Document : ',

            ] )
            ->add('searchedText', TextType::class, [
                'required'=>false,
                'label'=>'Recherche par mot-clés : ',
                'attr'=>[
                    'placeholder'=>'Mot-clés recherchés',
                ],
            ])
            ->add('exactSearch', CheckboxType::class, [
                'required' => false,
                'label' => 'Recherche exacte',

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DocumentSearch::class,
            'method'=>'get',
            'csrf_protection'=>false,
            'categories' => [],
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
