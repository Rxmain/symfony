<?php

namespace App\Form;

use App\Entity\Manga;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MangaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'Titre de mon manga',
                'attr' => [
                    'placeholder' => 'Saisissez ici le titre du manga'
                ]
            ])
            ->add('dateSortie')
            ->add('author', TextType::class, [
                'label'=>'Nom de l\'auteur',
                'attr'=> [
                    'placeholder'=> 'Saisissez ici le nom de l\'auteur'
                ]
            ])
            ->add('resume', TextareaType::class,  [
                'label'=>'Résumé du mange',
                'attr'=> [
                    'placeholder'=> 'Saisissez ici le résumé du manga'
                ]
            ])
            ->add('submit', SubmitType::class,  [
                'label'=>'Envoyer',
                'attr'=> [
                    'placeholder'=> 'Envoyer le formulaire'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Manga::class,
        ]);
    }
}
