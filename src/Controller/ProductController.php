<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/new", name= "formProduct")
     */
    public function new(Request $request)
    {

    	$product = new Product();

 		$form = $this->createForm(ProductType::class, $product);

 		 $form->handleRequest($request); // verification des contraintes imposées (ex : min caractères pour le champs description, NotBlank (ne pas retourner vide)...)

   		 if ($form->isSubmitted() && $form->isValid()) { // si "submit" ET tout est valide
       		 dump($product); // alors afficher le contenu de l'objet $article sur la console
   		 }

      
        return $this->render('products.html.twig', ['formulaire' => $form->createView()]);

    }
}