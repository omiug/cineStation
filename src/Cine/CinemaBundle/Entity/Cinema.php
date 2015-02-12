<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\CinemaRepository")
 * @ORM\Table(name="cin_cinema")
 */
class Cinema {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="civilite", type="string", length=50, nullable=false)
     */
    protected $titre; 

    /**
     * @ORM\Column(name="anneereal", type="integer", length=4)
     */
    protected $anneereal;

    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Genre," inversedBy="cinemas")
     * @ORM\JoinTable(name="cin_cinema_genre")
     */
    protected $genres;    

    /**
     * @ORM\OneToMany(targetEntity="Cine\CinemaBundle\Entity\Participant", mappedBy="cinema")
     */
    protected $participants;     

    /**
     * @ORM\Column(name="pays", type="string", length=30)
     */
    protected $pays;     

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
     * @ORM\Column(name="dureeFilm", type="time",  nullable=false)
     */
    protected $dureeFilm;   

    /**
     * @ORM\Column(name="actif", type="boolean",  nullable=false)
     */
    protected $actif;    

    public function __construct(){
        $this->genre = new ArrayCollection();
        $this->participant = new ArrayCollection();
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

    public function setAnneeReal($anneereal) {
        $this->anneereal = $anneereal;
    }

    public function getAnneeReal() {
        return $this->anneereal;
    }

    public function setGenres($genres) {
        foreach ($genres as $gre) {
            $this->addGenres($gre);
        }
    }

    public function getGenres() {
        return $this->genres;
    }

    public function addGenres(Genre $genre) {
        $this->genres = $genre;
    }

    public function removeGenres(Genre $genre) {
        $this->genres->removeElement($genre);
    }

    public function setParticipants($participants){
        foreach ($participants as $membre) {
            $this->addParticipant($membre);
        }
    }
    public function getParticipants() {
        return $this->participants;
    }

    public function addParticipant(Participant $membre) {
        $this->participants = $membre;
    }

    public function removeParticipant(Participant $membre) {
        $this->participants->removeElement($membre);
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }

    public function getPays() {
        return $this->pays;
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
