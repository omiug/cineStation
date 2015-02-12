<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\GroupeRepository")
 * @ORM\Table(name="usr_groupe")
 */

class Cinema extends BaseGroupe {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;   
    /**
     * @var string
     * @ORM\Column(name="civilite", type="string", length=50, nullable=false)
     */
    protected $titre; 
    /**
     * @var dateTime
     * @ORM\Column(name="anneereal", type="dateTime")
     */
    protected $anneereal;
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Genre," inversedBy="cinemas")
     * @ORM\JoinTable(name="cin_cinema_genre")
     */
    protected $genres;     
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cast", inversedBy="cinemas")
     * @ORM\JoinTable(name="cin_cinema_cast")
     */
    protected $realisateurs;     
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cast", inversedBy="cinemas")
     * @ORM\JoinTable(name="cin_cinema_cast")
     */
    protected $producteurs;     
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cast", inversedBy="cinemas")
     * @ORM\JoinTable(name="cin_cinema_cast")
     */
    protected $acteurs;     
    /**
     * @ORM\Column(name="pays", type="string", length=30, nullable=false)
     */
    protected $pays;     
    /**
     * @ORM\Column(name="scenaristes", type="array",  nullable=false)
     */
    protected $scenaristes;    
    /**
     * @ORM\Column(name="synopsys", type="text", length=255, nullable=false)
     */
    protected $synopsys;    
    /**
     * @ORM\Column(name="budget", type="float")
     */
    protected $budget;    
    /**
     * @ORM\Column(name="recompenses", type="array")
     */
    protected $recompenses;    
    /**
     * @ORM\Column(name="dureefilm", type="time",  nullable=false)
     */
    protected $dureefilm;    
    /**
     * @ORM\Column(name="actif", type="boolean",  nullable=false)
     */
    protected $actif;    
    
    public function getId() {
        return $this->id;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setAnneeReal($anneereal) {
        $this->anneereal = $anneereal;
    }

    public function getAnneeReal() {
        return $this->anneereal;
    }

    public function setGenres($genres) {
        $this->genres = $genres;
    }

    public function getGenres() {
        return $this->genres;
    }

    public function setRealisateurs($realisateurs) {
        $this->realisateurs = $realisateurs;
    }

    public function getRealisateurs() {
        return $this->realisateurs;
    }

    public function setProducteurs($producteurs) {
        $this->producteurs = $producteurs;
    }

    public function getProducteurs() {
        return $this->producteurs;
    }

    public function setActeurs($acteurs) {
        $this->acteurs = $acteurs;
    }

    public function getActeurs() {
        return $this->acteurs;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }

    public function getPays() {
        return $this->pays;
    }

    public function setScenaristes($scenaristes) {
        $this->scenaristes = $scenaristes;
    }

    public function getScenaristes() {
        return $this->scenaristes;
    }

    public function setSynopsys($synopsys) {
        $this->synopsys = $synopsys;
    }

    public function getSynopsys() {
        return $this->synopsys;
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

    public function setDureeFilm($dureefilm) {
        $this->dureefilm = $dureefilm;
    }

    public function getDureeFilm() {
        return $this->dureefilm;
    }

    public function setActif($actif) {
        $this->actif = $actif;
    }

    public function getActif() {
        return $this->actif;
    }
}
