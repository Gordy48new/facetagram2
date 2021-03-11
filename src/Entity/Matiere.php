<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
* @ORM\Entity()
* @ORM\Table(name="matiere")
* */
class Matiere
{

    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id;
    /**
    * @ORM\Column(type="string")
    */
    private $name;

    /**
     * Une matière a potentiellement plusieurs élèves
     * mappedBy=l'entité matière appelle les élèves 
     * @ORM\ManyToMany(targetEntity="App\Entity\Eleve", mappedBy="matiere")
     */
    private $eleve;

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
     * Get the value of eleve
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * Set the value of eleve
     *
     * @return  self
     */
    public function setEleve($eleve)
    {
        $this->eleve = $eleve;

        return $this;
    }
}