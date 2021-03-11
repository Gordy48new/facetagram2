<?php
// src/Controller/ClientController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ClientType;
use App\Entity\Client;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/new", name="newClient")
     */
    public function new(Request $request)
    {

    	$client = new Client();
    	
    	$client->setName('');
       
 		$form = $this->createForm(ClientType::class, $client);

 		 $form->handleRequest($request); 

   		 if ($form->isSubmitted() && $form->isValid()) { 
       		dump($client); 
   		 }

      
        return $this->render('client.html.twig', ['formulaireNew' => $form->createView()]);

    }
}