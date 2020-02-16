<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $tab = ['Sélectionner un type de document'=>null];
        foreach($options['categories'] as $category)
        {
            $tab[$category->getName()] = $category->getId();
        }
        $builder
            ->add('title', TextType::class, [
                'label'=> 'Titre du document : ',
                'attr' => [
                    'placeholder' => 'Titre',
                ]
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Document(s) : ',
                'attr' => [
                    'placeholder' => 'Sélectionnez un document',
                ]
            ])
            ->add('category', ChoiceType::class, [
                'choices'=>$tab,
                'label' => 'Catégorie : ',

            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
            'categories' => [],
        ]);
    }
}
