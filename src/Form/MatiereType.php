<?php 
// src/Form/MatiereType.php
namespace App\Form;


use Symfony\Component\Form\AbstractType;
use App\Entity\Eleve;
use App\Entity\Matiere;
use App\Entity\Professeur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MatiereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nom', TextType::class, ['label' => 'Nom'])
            ->add('eleve', EntityType::class, ['class' => Eleve::class,'choice_label' => 'eleves',])            
            ->add('professeur', EntityType::class, ['class' => Professeur::class,'choice_label' => 'professeurs',])
            
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Matiere::class,
        ]);
    }
}