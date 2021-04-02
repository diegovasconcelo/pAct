<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
            'label' => 'Títuto',
            'attr' => [
                'class' => 'form-control'
            ]
            ))
            -> add('content', TextareaType::class, array(
                'label' => 'Contenido',
                'attr' => [
                    'class' => 'form-control'
                ]
            ))
            -> add('priority', ChoiceType::class, array(
                'label' => 'Prioridad',
                'choices'=>[
                    'Alta'=>'High',
                    'Media'=>'Medium',
                    'Baja'=>'Low'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ))
            -> add('hours', TextType::class, array(
                'label' => 'Horas',
                'attr' => [
                    'class' => 'form-control'
                ]
            ))
            -> add('submit', SubmitType::class, array(
                'label' => 'Guardar',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ))
        ;
    }
}
