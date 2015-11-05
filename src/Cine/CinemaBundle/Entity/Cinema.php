<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="cine_cinema")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"film" = "Film", "cm" = "CourtMetrage", "serie" = "Serie"})
 * @UniqueEntity("titre")
 **/
class Cinema {
    
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
     * @ORM\Column(name="anneeReal", type="integer", length=4, nullable=false)
     */
    protected $anneeReal;

    /**
     * @ORM\Column(name="pays", type="string", length=30, nullable=true)
     */
    protected $pays;     

    /**
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="synopsis", type="text", length=255, nullable=false)
     */
    protected $synopsis;    

    /**
     * @ORM\Column(name="budget", type="float", nullable=true)
     */
    protected $budget;  

    /**
     * @ORM\Column(name="actif", type="boolean")
     */
    protected $actif;

    public function __construct(){
        $this->genre = new ArrayCollection();
        $this->participant = new ArrayCollection();
        $this->actif = true;
        
        $dateTime = new \DateTime();
        $this->anneeReal = $dateTime->format('Y');
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

    public function setActif($actif) {
        $this->actif = $actif;
    }

    public function getActif() {
        return $this->actif;
    }    
}
