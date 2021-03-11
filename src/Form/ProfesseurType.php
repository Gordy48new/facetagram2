<?php 
// src/Form/ProfesseurType.php
namespace App\Form;


use Symfony\Component\Form\AbstractType;
use App\Entity\Eleve;
use App\Entity\Lycee;
use App\Entity\Matiere;
use App\Entity\Professeur;
use App\Entity\Proviseur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProfesseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
        
            ->add('prenom', TextType::class, ['label' => 'Prénom'])
            ->add('nom', TextType::class, ['label' => 'Nom'])
            ->add('matiere', EntityType::class, ['class' => Matiere::class,'choice_label' => 'matiere',])            
            ->add('eleve', EntityType::class, ['class' => Eleve::class,'choice_label' => 'eleves',])
            ->add('proviseur', EntityType::class, ['class' => Proviseur::class,'choice_label' => 'proviseur',])
            ->add('lycee', EntityType::class, ['class' => Lycee::class,'choice_label' => 'lycee',])         
            
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }
}