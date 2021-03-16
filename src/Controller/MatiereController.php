<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MatiereType;
use App\Entity\Matiere;

class MatiereController extends AbstractController
{
    /**
     * @Route("/matiere/new", name= "formMatiere")
     */
    public function new(Request $request)
    {

    	$matiere = new Matiere();

 		$form = $this->createForm(MatiereType::class, $matiere);

 		 $form->handleRequest($request); 

   		 if ($form->isSubmitted() && $form->isValid()) { 
       		 dump($matiere); 
   		 }

      
        return $this->render('new.html.twig', ['formulaire' => $form->createView()]);

    }
}