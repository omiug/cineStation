<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\MappedSuperclass
 * @UniqueEntity("titre")
 */
abstract class Cinema {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="titre", type="string", length=50, nullable=false)
     */
    protected $titre; 

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = 4,
     *      min = 4,
     *      exactMessage = "L'année doit être sur 4 chiffres"
     * )
     *
     * @ORM\Column(name="anneeReal", type="integer", length=4)
     */
    protected $anneeReal;

    /**
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="pays", type="string", length=30)
     */
    protected $pays;     

    /**
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="synopsis", type="text", length=255, nullable=false)
     */
    protected $synopsis;    

    /**
     * @ORM\Column(name="budget", type="float")
     */
    protected $budget;  

    /**
     * @ORM\Column(name="recompenses", type="array")
     */
    protected $recompenses;  

    /**
     * @ORM\Column(name="actif", type="boolean")
     */
    protected $actif;


    public function __construct(){
        $this->genre = new ArrayCollection();
        $this->participant = new ArrayCollection();
        $this->actif = true;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setAnneeReal($anneeReal) {
        $this->anneeReal = $anneeReal;
    }

    public function getAnneeReal() {
        return $this->anneeReal;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }

    public function getPays() {
        return $this->pays;
    }

    public function setSynopsis($synopsis) {
        $this->synopsis = $synopsis;
    }

    public function getSynopsis() {
        return $this->synopsis;
    }

    public function setBudget($budget) {
        $this->budget = $budget;
    }

    public function getBudget() {
        return $this->budget;
    }

    public function setRecompenses($recompenses) {
        $this->recompenses = $recompenses;
    }

    public function getRecompenses() {
        return $this->recompenses;
    }

    public function setActif($actif) {
        $this->actif = $actif;
    }

    public function getActif() {
        return $this->actif;
    }
}
