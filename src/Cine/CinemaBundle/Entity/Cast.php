<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Cast{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;  
	/**
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    protected $nom; 
	/**
     * @ORM\Column(name="prenom", type="string", length=50, nullable=false)
     */
    protected $prenom; 
	/**
     * @ORM\Column(name="pseudo", type="string", length=50)
     */
    protected $pseudo; 
	/**
     * @ORM\Column(name="datenaissance", type="string", length=50, nullable=false)
     */
    protected $datenaissance; 
	/**
     * @ORM\Column(name="nationalite", type="string", length=50, nullable=false)
     */
    protected $nationalite; 
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cast")
     * @ORM\JoinTable(name="cin_cinema_cast")
     */
    protected $realisations; 
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cast")
     * @ORM\JoinTable(name="cin_cinema_cast")
     */
    protected $productions;
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cast")
     * @ORM\JoinTable(name="cin_cinema_cast")
     */
    protected $roles;
    /**
     * @ORM\Column(name="scenarisations", type="array", nullable=false)
     */
    protected $scenarisations; 
    /**
     * @ORM\Column(name="recompenses", type="array")
     */
    protected $recompenses; 

    public function getId() {
        return $this->id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function getNom() {
        return $this->nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    public function getPrenom() {
        return $this->prenom;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }
    public function getPseudo() {
        return $this->pseudo;
    }

    public function setDateNaissance($datenaissance) {
        $this->datenaissance = $datenaissance;
    }
    public function getDateNaissance() {
        return $this->datenaissance;
    }

    public function setNationalite($nationalite) {
        $this->nationalite = $nationalite;
    }
    public function getNationalite() {
        return $this->nationalite;
    }

    public function setRealisations($realisations) {
        $this->realisations = $realisations;
    }
    public function getRealisations() {
        return $this->realisations;
    }

    public function setProductions($productions) {
        $this->productions = $productions;
    }
    public function getProductions() {
        return $this->productions;
    }

    public function setRoles($roles) {
        $this->roles = $roles;
    }
    public function getRoles() {
        return $this->roles;
    }

    public function setScenarisations($scenarisations) {
        $this->scenarisations = $scenarisations;
    }
    public function getScenarisations() {
        return $this->scenarisations;
    }

    public function setRecompenses($recompenses) {
        $this->recompenses = $recompenses;
    }
    public function getRecompenses() {
        return $this->recompenses;
    }
}