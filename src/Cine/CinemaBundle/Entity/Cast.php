<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\Column(name="dateNaissance", type="datetime")
     */
    protected $dateNaissance; 

    /**
     * @ORM\Column(name="nationalite", type="string", length=50)
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
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cinema", MappedBy="scenaristes")
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
        $this->scenarisations = new ArrayCollection();
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

    public function setDateNaissance(\DateTime $dateNaissance) {
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
        foreach ( $realisations as $rea ) {
            $this->addRealisation($rea);
        }
    }

    public function getRealisations() {
        return $this->realisations;
    }

    public function addRealisation(Cinema $cine) {
        $this->realisations[] = $cine;
    }

    public function removeRealisation(Cinema $cine) {
        $this->realisations->removeElement($cine);
    }

    public function setProductions($productions) {
        foreach ( $productions as $prod ) {
            $this->addProduction($prod);
        }
    }
    
    public function getProductions() {
        return $this->productions;
    }

    public function addProduction(Cinema $cine) {
        $this->productions[] = $cine;
    }

    public function removeProduction(Cinema $cine) {
        $this->productions->removeElement($cine);
    }

    public function setRoles($roles) {
        foreach ( $roles as $role ) {
            $this->addRole($role);
        }
    }

    public function getRoles() {
        return $this->roles;
    }

    public function addRole(Cinema $cine) {
        $this->roles[] = $cine;
    }

    public function removeRole(Cinema $cine) {
        $this->roles->removeElement($cine);
    }

    public function setScenarisations($scenarisations) {
        foreach ( $scenarisations as $senar ) {
            $this->addScenarisation($senar);
        }
    }

    public function getScenarisations() {
        return $this->scenarisations;
    }

    public function addScenarisation(Cinema $cine) {
        $this->scenarisations[] = $cine;
    }

    public function removeScenarisation(Cinema $cine) {
        $this->scenarisations->removeElement($cine);
    }

    public function setRecompenses($recompenses) {
        $this->recompenses = $recompenses;
    }
    
    public function getRecompenses() {
        return $this->recompenses;
    }
}
