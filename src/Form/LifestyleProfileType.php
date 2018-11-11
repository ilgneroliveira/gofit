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
            ->add('nutrition_a')
            ->add('nutrition_b')
            ->add('nutrition_c')
            ->add('physical_activity_d')
            ->add('physical_activity_e')
            ->add('physical_activity_f')
            ->add('preventive_behavior_g')
            ->add('preventive_behavior_h')
            ->add('preventive_behavior_i')
            ->add('relationships_j')
            ->add('relationships_k')
            ->add('relationships_l')
            ->add('stress_management_m')
            ->add('stress_management_n')
            ->add('stress_management_o')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LifestyleProfile::class,
        ]);
    }
}
