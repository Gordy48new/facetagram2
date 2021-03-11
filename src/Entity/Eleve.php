<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="eleve")
* */
class Eleve
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * Plusieurs élèves ont potentiellement un lycee
     * mappedBy=l'entité eleve appelle le lycee 
     * @ORM\ManyToOne(targetEntity="App\Entity\Lycee", inversedBy="eleves")
     * @ORM\JoinColumn(name="lycee_id", referencedColumnName="id")
     */
    private $lycee;

    /**
     * Plusieurs élèves ont potentiellement plusieurs professeurs
     * mappedBy=l'entité eleve appelle les professeurs 
     * @ORM\ManyToMany(targetEntity="App\Entity\Professeur", inversedBy="eleves")
     * @ORM\JoinTable(name="professeurs_eleves")
     */
    private $professeurs;

    /**
     * Plusieurs élèves ont potentiellement plusieurs matieres
     * mappedBy=l'entité eleve appelle les matieres 
     * @ORM\ManyToMany(targetEntity="App\Entity\Matiere", inversedBy="eleves")
     * @ORM\JoinTable(name="eleves_matieres")
     */
    private $matieres;

    public function __construct()
    {
        $this->professeurs = new ArrayCollection();
        $this->matieres = new ArrayCollection();
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of lycee
     */
    public function getLycee()
    {
        return $this->lycee;
    }

    /**
     * Set the value of lycee
     *
     * @return  self
     */
    public function setLycee($lycee)
    {
        $this->lycee = $lycee;

        return $this;
    }

    /**
     * Get the value of professeurs
     */
    public function getProfesseurs()
    {
        return $this->professeurs;
    }

    /**
     * Set the value of professeurs
     *
     * @return  self
     */
    public function setProfesseurs($professeurs)
    {
        $this->professeurs = $professeurs;

        return $this;
    }

    /**
     * Get the value of matieres
     */
    public function getMatieres()
    {
        return $this->matieres;
    }

    /**
     * Set the value of matieres
     *
     * @return  self
     */
    public function setMatieres($matieres)
    {
        $this->matieres = $matieres;

        return $this;
    }
}