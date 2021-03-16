<?php
// src/Controller/FormController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MaterielType;
use App\Entity\Materiel;
use App\Repository\MaterielRepository;



class MaterielController extends AbstractController
{
    
    /**
     * @Route("/materielForm", name="materielForm" )
     */
public function new(Request $request)
{
    $materiel = new Materiel();

    $form = $this->createForm(MaterielType::class, $materiel);

     $form->handleRequest($request); 

       if ($form->isSubmitted() && $form->isValid()) { 
           dump($materiel); 
       }

 
   return $this->render('materiel.html.twig', ['matFormulaire' => $form->createView()]);
}

    /**
     * @Route("/materielList", name="materielList" )
     */
    public function show(Request $request)
    {
        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $repository = $this->getDoctrine()->getRepository(Materiel::class);
        // a ce stade il a accès au données
        // je veux stocker dans la variable $contacts TOUT mes contacts
        $lemateriel = $repository->findAll();

//affichage de la pg contactlist.html.twig
// entre guillement c'est le nom utilisé sur TWIG
// avec $ c'est utilisé sur le controller

    return $this->render('materielList.html.twig', ['lemateriel'=>$lemateriel]);
    }

    /**
     * @Route("/materiel/listApple", name="listApple" )
     */
    public function showapple(Request $request)
    {
        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $repository = $this->getDoctrine()->getRepository(Materiel::class);
        // a ce stade il a accès au données
        // je veux stocker dans la variable $contacts TOUT mes contacts
        $lemateriel = $repository->findBy(['entreprise'=> 'Apple']);

//affichage de la pg contactlist.html.twig
// entre guillement c'est le nom utilisé sur TWIG
// avec $ c'est utilisé sur le controller

return $this->render('materielList.html.twig', ['lemateriel'=>$lemateriel]);
    }
    /**
     * @Route("materiel/listGreat", name="listGreat" )
     */
    public function showgreaterthanprice(MaterielRepository $monPanier)
    {//
        //var qui contient le
       $prix= 500;
        // dans ma var materiaux je recupere doctrine, repository de la class Materiel et la function qui selectionne les materiaux sup à 500euro
        $lemateriel = $monPanier->findAllGreaterThanPrice($prix);

//affichage de la list des materiaux (list.html.twig)
// dans les crochets entre guillement c'est le nom utilisé sur TWIG
// avec $ c'est utilisé sur le controller
    return $this->render('materielList.html.twig', ['lemateriel'=>$lemateriel]);
    }
    /**
     * @Route("materiel/new", name="materiel")
     */
    public function materiel(Request $request)
    {
        $materiel = new Materiel();

        //création d'un nouvel objet form dont j'ai appelé la creation par la function par defaut buildForm ds le fichier ContactType.php de la class ContactType
        $form = $this->createForm(MaterielType::class, $materiel);
 		$form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // si "submit" ET tout est valide

             dump($materiel);// alors afficher le contenu de l'objet $article sur la console
             
             // $em(entity manager)je recupere le manageur des données de ma table
            $em = $this->getDoctrine()->getManager();
            // Je prepare la sauvegarde / l'insertion de mon objet $contact dans ma base (1 ligne de table)
            $em->persist($materiel);
            // execution de l'SQL
            $em->flush();
        }

        
        return $this->render('materielList.html.twig', ['formulaire' => $form->createView()]);
    }
    /**
     * @Route("/materiel/edit/{id<\d+>}")
     */
    public function edit(Request $request, Materiel $materiel)
    {
        $form = $this->createForm(MaterielType::class, $materiel);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // va effectuer la requête d'UPDATE en base de données
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('/Materiel/new.html.twig', ['formulaire'=>$form->createView()]);
    }
    /**
     * @Route("/materiel/delete/{id<\d+>}")
     */
    public function delete(Request $request, Materiel $materiel)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($materiel);
        $em->flush();

        // redirige la page
        return $this->redirectToRoute('home');
    }

    
}