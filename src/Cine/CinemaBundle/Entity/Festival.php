<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Festival
{
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
     * @ORM\Column(name="datedebut", type="dateTime", nullable=false)
     */
    protected $datedebut;
    /**
     * @ORM\Column(name="datefin", type="dateTime", nullable=false)
     */
    protected $datefin;
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Film")
     * @ORM\JoinTable(name="cin_cinema_film")
     */
    protected $film;
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\CourtMetrage")
     * @ORM\JoinTable(name="cin_cinema_courtmetrage")
     */
    protected $courtmetrage;
    /**
     * @ORM\Column(name="description", type="text", length=255, nullable=false)
     */
    protected $description;

    public function getId(){
    	return $this->id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function getNom() {
        return $this->nom;
    }

    public function setDateDebut($datedebut) {
        $this->datedebut = $datedebut;
    }
    public function getDateDebut() {
        return $this->datedebut;
    }

    public function setDateFin($datefin) {
        $this->datefin = $datefin;
    }
    public function getDateFin() {
        return $this->datefin;
    }

    public function setFilm($film) {
        $this->film = $film;
    }
    public function getFilm() {
        return $this->film;
    }

    public function setCourtMetrage($courtmetrage) {
        $this->courtmetrage = $courtmetrage;
    }
    public function getCourtMetrage() {
        return $this->courtmetrage;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    public function getDescription() {
        return $this->description;
    }
	
}
?>