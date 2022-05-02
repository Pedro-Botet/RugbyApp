<?php

namespace App\Form;

use App\Entity\Jugador;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Length;

class RegisterJugadorType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Introduzca su Nombre',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'El nombre no puede ser inferior a {{ limit }} carácteres',
                        'max' => 40,
                        'maxMessage' => 'El nombre no pude ser superior a {{ limit }} carácteres',
                    ])
                ],
            ])
            ->add('apellido', TextType::class, [
                'label' => 'Introduzca su Apellido',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'El apellido no puede ser inferior a {{ limit }} carácteres',
                        'max' => 40,
                        'maxMessage' => 'El apellido no pude ser superior a {{ limit }} carácteres',
                    ])
                ],
            ])
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
            ->add('telefono', TextType::class, [
                'label' => 'Introduzca su Teléfono',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Length([
                        'max' => 15,
                        'maxMessage' => 'El télefono no puede ser superior a {{ limit }} caracteres',
                    ])
                ],
                'required' => false,
            ])
            ->add('fecha_nacimiento', DateType::class, [
                'label' => 'Introduzca su Fecha de Nacimiento',
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'form-control js-datepicker'],
            ])
            ->add('altura', TextType::class, [
                'label' => 'Introduzca su Altura en Centímetros',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Length([
                        'min' => 3,
                        'minMessage' => 'El código postal no puede ser inferior a {{ limit }} caracteres',
                        'max' => 3,
                        'maxMessage' => 'El código postal no puede ser superior a {{ limit }} caracteres',
                    ])
                ],
                'required' => false,
            ])
            ->add('peso', TextType::class, [
                'label' => 'Introduzca su Peso en Kilogramos',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'El código postal no puede ser inferior a {{ limit }} caracteres',
                        'max' => 4,
                        'maxMessage' => 'El código postal no puede ser superior a {{ limit }} caracteres',
                    ])
                ],
                'required' => false,
            ])
            ->add('capitan', ChoiceType::class, [
                'choices' => [
                    'active' => true,
                    'inactive' => false
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jugador::class,
        ]);
    }
}
