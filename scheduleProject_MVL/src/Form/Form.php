<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class Form extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('email', EmailType::class)
            ->add('age', NumberType::class)
            ->add('schedule', ChoiceType::class, [
                'choices' => [
                    'Profesional' => "Profesional",
                    'Personal' => "Personal",
                ],
            ])->add('telephone', NumberType::class)
            ->add('Submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary mt-2 w-25 hvr-shadow-radial']
            ]);
    }
}