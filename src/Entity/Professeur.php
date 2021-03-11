<?php
// src/Entity/Lycee.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\ProfesseurRepository;
/**
* @ORM\Entity()
* @ORM\Table(name="professeur")
* */
class Professeur
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
     * Un licee à plusieurs profs
     * @ORM\ManyToOne(targetEntity="App\Entity\Lycee", inversedBy="professeurs")
     * * @ORM\JoinColumn(name="lycee_id", referencedColumnName="id")
     */
    private $lycee;

    /**
     * Un professeur a potentiellement une matiere 
     * @ORM\OneToOne(targetEntity="App\Entity\Matiere", inversedBy="professeurs")
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id")
     */
    private $matiere;

    
    /**
     * Il y a plusieurs profs possibles par eleve
     * @ORM\ManyToMany(targetEntity="App\Entity\Eleve", mappedBy="professeur")
     * @ORM\JoinTable(name="professeur_eleve")
     */
    private $eleves;

    public function __construct() {
        $this->eleves = new ArrayCollection();
    }
    

    

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get il y a un seul panier possible par client
     */ 
    public function getLycee()
    {
        return $this->lycee;
    }

    /**
     * Set il y a un seul panier possible par client
     *
     * @return  self
     */ 
    public function setLycee($lycee)
    {
        $this->lycee = $lycee;

        return $this;
    }

    /**
     * Get un professeur a potentiellement une matiere
     */ 
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set un professeur a potentiellement une matiere
     *
     * @return  self
     */ 
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get il y a plusieurs profs possibles par eleve
     */ 
    public function getEleves()
    {
        return $this->eleves;
    }

    /**
     * Set il y a plusieurs profs possibles par eleve
     *
     * @return  self
     */ 
    public function setEleves($eleves)
    {
        $this->eleves = $eleves;

        return $this;
    }
}