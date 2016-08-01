<?php

// src/AppBundle/Form/RegistrationType.php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('sexe', ChoiceType::class, array(
                'choices' => array(
                    'homme' => 'Homme',
                    'femme' => 'Femme'
                ),
                'required'    => true,
                'placeholder' => 'Selectionnez votre sexe',
                'empty_data'  => null
            ))
            ->add('adresse_postale', 'text', array(
                'required' => false
            ))
            ->add('code_postal', 'integer', array(
                'required' => false
            ))
            ->add('ville', 'text', array(
                'required' => false
            ))
            ->add('date_naissance', DateType::class, array(
                'widget' => 'single_text',
                'attr' => ['class' => 'datepicker'],
                'format' => 'dd-MM-yyyy'
            ))
            ->add('github', 'text', array(
                'required' => false
            ))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}