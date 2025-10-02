<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class TaskForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $is_new = $options['is_new'] ?? true;
        
        $builder
            ->add('id', HiddenType::class, [
                'required' => false,
                'mapped' => true,
            ])
            ->add('title', TextType::class, [
                'required' => true,
                'mapped' => true,
                'attr' => [
                    'maxlength' => 100
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Campo vacio',
                    ]),
                ],
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'mapped' => true,
                'attr' => [
                    'maxlength' => 300,
                    'row' => 10
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Campo vacio',
                    ]),
                ],
            ])
            ->add('isCompleted', CheckboxType::class, [
                'mapped' => true,
                'required' => false,
            ])
            ->add('createdBy', TextType::class, [
                'required' => false,
                'mapped' => true,
                'attr' => [
                    'maxlength' => 50,
                    'readonly' => ! $is_new
                ],
                'constraints' => $is_new ? [
                    new NotBlank([
                        'message' => 'Campo vacio',
                    ]),
                ] : [],
            ])
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Data\TaskData::class,
            // -----
            'is_new' => true
        ]);
    }
}