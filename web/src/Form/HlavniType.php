<?php

namespace App\Form;

use App\Entity\Hlavni;
use App\Entity\Vaha;
use App\Entity\Vek;
use App\Entity\Vyska;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HlavniType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('vyska1', EntityType::class, ['class' => Vyska::class, 'choice_label' => 'vyska'])
            ->add('vaha1', EntityType::class, ['class' => Vaha::class, 'choice_label' => 'vaha'])
            ->add('vek1', EntityType::class, ['class' => Vek::class, 'choice_label' => 'vek'])
            ->add('jmeno', RadioType::class)
            ->add('prijmeni', TextType::class)
            ->add('adresa', TextareaType::class)
            ->add('ulice', CheckboxType::class)
            ->add('mesto', EmailType::class)
            ->add('psc', PasswordType::class)
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hlavni::class,
        ]);
    }
}
