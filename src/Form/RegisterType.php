<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Prénom'
                ],
                'constraints' => [
                    new Length(
                        [
                            'min'=> 2,
                            'max'=> 255
                        ]
                    )
                ]

            ])
            ->add('last_name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom'
                ],
                'constraints' => [
                    new Length(
                        [
                            'min'=> 2,
                            'max'=> 255
                        ]
                    )
                ]

            ])
            ->add('email', EmailType::class, [
                'label' => 'Mail',
                'attr' => [
                    'placeholder' => 'Mail'
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Vos mots de passe ne correspondent pas',
                'first_options' => [
                    'label' => 'Password',
                    'attr' => [
                        'placeholder' => 'Entrez votre mot de passe'
                    ]],
                'second_options' => [
                    'label' => 'Confirmez votre mot de passe',
                    'attr' => [
                        'placeholder' => 'Confirmez votre de mot de passe'
                    ]
                ]

            ])
            ->add('register', SubmitType::class, [
                'label' => 'S\inscrire'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }


}
