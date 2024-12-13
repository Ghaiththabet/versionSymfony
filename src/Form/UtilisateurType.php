<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('username', TextType::class, [
            'label' => 'Nom d\'utilisateur',
            'attr' => ['class' => 'form-control'],
        ])
        ->add('userEmail', EmailType::class, [
            'label' => 'Adresse Email',
            'attr' => ['class' => 'form-control'],
        ])
        ->add('userPwd', PasswordType::class, [
            'label' => 'Mot de passe',
            'attr' => ['class' => 'form-control'],
        ])
        ->add('roles', TextType::class, [
            'label' => 'Rôle',
            'attr' => ['class' => 'form-control'],
            'required' => true, // Rôle facultatif si tu ne veux pas le faire dans le formulaire
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Créer un utilisateur',
            'attr' => ['class' => 'btn btn-primary'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
            // Configure your form options here
        ]);
    }
}
