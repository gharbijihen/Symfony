<?php

namespace App\Form;

use App\Entity\Author;
use Symfony\Component\Form\AbstractType;
<<<<<<< HEAD
=======
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
>>>>>>> ebbd357 ('s4')
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('email')
<<<<<<< HEAD
=======
            ->add('Save',SubmitType::class)
>>>>>>> ebbd357 ('s4')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Author::class,
        ]);
    }
}
