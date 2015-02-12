<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\CastRepository")
 * @ORM\Table(name="cin_cast")
 */
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
     * @ORM\Column(name="dateNaissance", type="string", length=50, nullable=false)
     */
    protected $dateNaissance; 
	/**
     * @ORM\Column(name="nationalite", type="string", length=50, nullable=false)
     */
    protected $nationalite; 
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cinema", MappedBy="realisateurs")
     */
    protected $realisations; 
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cinema", MappedBy="producteurs")
     */
    protected $productions;
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cinema", MappedBy="acteurs")
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

    public function __construct(){
        $this->realisations = new ArrayCollection();
        $this->productions = new ArrayCollection();
        $this->roles = new ArrayCollection();
    }

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

    public function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }
    public function getdateNaissance() {
        return $this->dateNaissance;
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
