<?php

namespace App\Form;

use App\Entity\LifestyleProfile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LifestyleProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nutrition')
            ->add('physical_activity')
            ->add('preventive_behavior')
            ->add('relationships')
            ->add('stress_management')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LifestyleProfile::class,
        ]);
    }
}
