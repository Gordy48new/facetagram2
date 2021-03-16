<?php 
// src/Form/ContactType.php
namespace App\Form;


use Symfony\Component\Form\AbstractType;
use App\Entity\Materiel;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MaterielType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nom', TextType::class, ['label' => 'nom'])
            ->add('prix', IntegerType::class, ['label' => 'prix'])
            ->add('entreprise', TextType::class,  ['label' => 'entreprise']) 
            ->add('livraisonGratuite', CheckboxType::class, [
                'attr' => array('checked' => 'checked'),'label'=> 'livraison gratuite','required'=> false])
            
            
            
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Materiel::class,
        ]);
    }
}