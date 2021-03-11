<?php 
// src/Form/ContactType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('firstName', TextType::class, ['label' => 'Prénom'])
            ->add('lastName', TextType::class, ['label' => 'Nom'])
            ->add('organization', TextType::class, ['label' => 'Organization'])
            ->add('jobTitle', TextType::class, ['label' => 'Profession'])
            ->add('email', EmailType::class, ['label' => 'Adresse email'])
            ->add('phoneNumber', TelType::class, ['label' => 'Telephone'])       
            ->add('message', TextareaType::class, ['label' => 'Message', 'disabled'=> false])
            ->add('description', TextareaType::class, ['label' => 'Description', 'disabled'=> false])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}