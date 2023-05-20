<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('email')
           // ->add('roles')
            ->add('password', PasswordType::class, [
                'mapped' => false,
                "constraints" => [
                    new NotBlank(),
                    new Regex([
                        'pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/',
                        'match'   => true,
                        'message' => 'La contraseña no es válida. Debe contener al menos 8 caracteres: un número, una letra mayúscula y una letra minúscula.'
                    ])
                ]
            ])
            ->add('imagen')
            // , FileType::class, 
            // [
            //     'label' => 'Foto',

            //     // unmapped means that this field is not associated to any entity property
            //     //'mapped' => false,

            //     // make it optional so you don't have to re-upload the PDF file
            //     // every time you edit the Product details
            //     'required' => false,

            //     // unmapped fields can't define their validation using annotations
            //     // in the associated entity, so you can use the PHP constraint classes
            //     'constraints' => [
            //         new File([
            //             'maxSize' => '1024k',
            //             'mimeTypes' => [
            //                 'image/jpg',
            //                 'image/jpeg',
            //                 'image/png',
            //                 'image/webp',
            //             ],
            //             'mimeTypesMessage' => 'Por favor, sube una imagen con un formato adecuado.',
            //         ])
            //     ],
            // ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
