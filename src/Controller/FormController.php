<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use App\Entity\Contact;

class FormController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function new(Request $request)
    {
        $contact = new Contact();
        
        $form = $this->createForm(ContactType::class , $contact);

               
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) 
       {
           dump($contact);
           //Je recupère le manageur des données de ma table
           $em = $this->getDoctrine()->getManager();
           // Je prepare la sauvegarde / l'insertion de mon objet $contact dans ma base (1 ligne de table)
           $em->persist($contact); 
            // execution de l'SQL
           $em->flush();

       }
    
        return $this->render('contact.html.twig' , ['formulaire' => $form->createView()]);

    }
}
