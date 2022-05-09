<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Correo electrónico',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Length([
                        'max' => 100,
                        'maxMessage' => 'El mail no puede ser superior a {{ limit }} caracteres',
                    ])
                ],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Introduzca una Contraseña',
                'help' => 'Elige una contraseña de mínimo 8 carácteres y que contenga letras minúsculas, mayúsculas y algún número',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor, introduzca una contraseña',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'La contraseña no puede ser inferior a {{ limit }} carácteres',
                        'max' => 50,
                        'maxMessage' => 'La contraseña no puede ser superior a {{ limit }} carácteres',
                    ]),
                ],
                'mapped' => false,
            ])
            ->add('password2', PasswordType::class, [
                'label' => 'Vuelva a introducir la contraseña',
                'help' => 'Elige una contraseña de mínimo 8 caracteres y que contenga letras minúsculas, mayúsculas y algún número',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor, introduzca una contraseña',
                    ]),
                ],
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
