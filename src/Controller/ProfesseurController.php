<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProfesseurType;
use App\Entity\Professeur;

class ProfesseurController extends AbstractController
{
    /**
     * @Route("/professeur/new", name= "formProfesseur")
     */
    public function new(Request $request)
    {

    	$professeur = new Professeur();

 		$form = $this->createForm(ProfesseurType::class, $professeur);

 		 $form->handleRequest($request); 

   		 if ($form->isSubmitted() && $form->isValid()) { 
       		 dump($professeur); 
   		 }

      
        return $this->render('new.html.twig', ['formulaire' => $form->createView()]);

    }
}