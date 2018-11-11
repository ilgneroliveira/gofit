<?php

namespace App\Form;

use App\Entity\ExercisesDone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExercisesDoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('execute_at')
            ->add('time_execute')
            ->add('user')
            ->add('exercise')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ExercisesDone::class,
        ]);
    }
}
