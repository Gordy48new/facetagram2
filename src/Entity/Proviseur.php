<?php
// src/Entity/Lycee.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProviseurRepository;
/**
* @ORM\Entity()
* @ORM\Table(name="proviseur")
* */
class Proviseur
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;
    

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

   
}