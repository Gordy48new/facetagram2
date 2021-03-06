<?php
// src/Controller/FormController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use App\Entity\Contact;
use App\Service\MessageGenerator;

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

    /**
     * @Route("/contactlist", name="contactlist" )
     */
    public function show(Request $request, MessageGenerator $messageGenerator)
    {
        // je pense à bien injecter en parametre mon service pour l'utiliser

        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $repository = $this->getDoctrine()->getRepository(Champs::class);
        $contacts = $repository->findAll();

        // stocker dans $message le resultat du service : donc un message gentil
        $message = $messageGenerator->getHappyMessage();

        // entre guillement c'est le nom utilisé sur TWIG
        // avec $ c'est utilisé sur le controller

    return $this->render('contactlist.html.twig', ['contacts'=>$contacts, 'message'=> $message]);
    }
    
    

        /**
         * @Route("/contact/edit/{id<\d+>}")
         */
        public function edit(Request $request, Contact $contact)
        {
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        // va effectuer la requête d'UPDATE en base de données
        $this->getDoctrine()->getManager()->flush();
        }

         return $this->render('contact.html.twig', ['formulaire'=>$form->createView()]);
        }


        /**
        * @Route("/contact/delete/{id<\d+>}")
        */
        public function delete(Request $request, Contact $contact)
        {
        $em = $this->getDoctrine()->getManager();
    
        $em->remove($contact);
        $em->flush();

        // redirige la page
        return $this->redirectToRoute('home');
        }   
}
