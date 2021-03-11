<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FacetagramController extends AbstractController
{
/**
* @Route("/", name="home")
*/
public function home()
    {        
        return $this->render('home.html.twig');
    }
/**
* @Route("/about", name="about")
*/
public function about()
    {        
        return $this->render('about.html.twig');
    } 
/**
* @Route("/products", name="products")
*/
public function products()
    {        
        return $this->render('products.html.twig');
    }     
/**
* @Route("/services",name="services")
*/
public function services()
    {        
        return $this->render('services.html.twig');
    } 
/**
* @Route("/category",name="category")
*/
public function category()
    {        
        return $this->render('categories.html.twig');
    } 
}