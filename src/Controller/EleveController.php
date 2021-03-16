<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EleveType;
use App\Entity\Eleve;


class EleveController extends AbstractController
{
    /**
     * @Route("/eleve/new", name= "formEleve")
     */
    public function new(Request $request)
    {

    	$eleve = new Eleve();

 		$form = $this->createForm(EleveType::class, $eleve);

 		 $form->handleRequest($request); 

   		 if ($form->isSubmitted() && $form->isValid()) { 
       		 dump($eleve); 
   		 }

      
        return $this->render('new.html.twig', ['formulaire' => $form->createView()]);

    }
}