<?php

namespace App\Entity;

use App\Repository\LyceeRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="lycee")
* */
class Lycee
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
    private $name;
    /**
     * Un lycee a potentiellement plusieurs professeurs
     * mappedBy=l'entité lycee appelle les professeurs 
     * @ORM\OneToMany(targetEntity="App\Entity\Professeur", mappedBy="lycee")
     */
    private $professeurs;

    /**
     * Un lycee a potentiellement un proviseur
     * mappedBy=l'entité lycee appelle le proviseur 
     * @ORM\OneToOne(targetEntity="App\Entity\Proviseur", mappedBy="lycee")
     * @ORM\JoinColumn(name="proviseur_id", referencedColumnName="id")
     */
    private $proviseur;

    /**
     * Un lycee a potentiellement plusieurs élèves
     * mappedBy=l'entité lycee appelle les élèves 
     * @ORM\OneToMany(targetEntity="App\Entity\Eleve", mappedBy="lycee")
     */
    private $eleves;

    public function __construct()
    {
        $this->professeurs = new ArrayCollection();
        $this->eleves = new ArrayCollection();
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
     * Get un lycee a potentiellement plusieurs professeurs
     */
    public function getProfesseurs()
    {
        return $this->professeurs;
    }

    /**
     * Set un lycee a potentiellement plusieurs professeurs
     *
     * @return  self
     */
    public function setProfesseurs($professeurs)
    {
        $this->professeurs = $professeurs;

        return $this;
    }

    /**
     * Get un lycee a potentiellement un proviseur
     */
    public function getProviseur()
    {
        return $this->proviseur;
    }

    /**
     * Set un lycee a potentiellement un proviseur
     *
     * @return  self
     */
    public function setProviseur($proviseur)
    {
        $this->proviseur = $proviseur;

        return $this;
    }

    /**
     * Get the value of eleves
     */
    public function getEleves()
    {
        return $this->eleves;
    }

    /**
     * Set the value of eleves
     *
     * @return  self
     */
    public function setEleves($eleves)
    {
        $this->eleves = $eleves;

        return $this;
    }
}