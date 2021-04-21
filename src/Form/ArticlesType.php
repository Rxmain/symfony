<?php

namespace App\Form;

use App\Entity\Articles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class, [
                'label'=>'Contenu',
                'attr' => [
                    'placeholder' => 'Contenu de l\'article'
                ]
            ])
            ->add('date')
            ->add('author', TextType::class, [
                'label'=>'Auteur',
                'attr' => [
                    'placeholder' => 'Auteur'
                ]
            ])
            ->add('category', TextType::class, [
                'label'=>'Catégorie',
                'attr' => [
                    'placeholder' => 'Catégorie de l\'article'
                ]
            ])
            ->add('send', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
