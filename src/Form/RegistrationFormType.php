<?php

/* Cette page nous permet d'avoir le back-end de la page "Devenir Membre */
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        /*cette ligne de code permet de rajouter les informations qui vont apparaître sur le formulaire
        add est la méthode qui permet de rajouter les infos/ add a 2 paramètres:
        1. paramètre1: Permet de préciser à quelle entité sera reliée le champs du formulaire
        2. paramètre2:Permet de préciser le type du champs html: input, emaill etc...  */
            ->add('nom', TextType::class) 
            ->add('prenom', TextType::class) 
            ->add('telephone', TelType::class)
            ->add('email', EmailType::class)
            ->add('adresseFacturation', TextType::class)
            ->add('villeFacturation', TextType::class) 
            ->add('codeFacturation', TextType::class)


        /* C'est cette partie qui est configurée pour le mot de passe */
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => "Le mot de passe doit être identique, veuillez recommencer.",
                'required' => true,
            ])

            /* Cette partie permet de faire accepter les conditions d'utilisation du site */
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false, /* cette propriété ne se trouve pas dans le champs de User */
                'constraints' => [
                    new IsTrue([
                        'message' => " Veuillez lire et accepter les conditions d'utilisation.",
                    ]),
                ],
            ])



        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
