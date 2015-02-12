<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\FestivalRepository")
 * @ORM\Table(name="cin_festival")
 */
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
     * @ORM\Column(name="dateDebut", type="dateTime", nullable=false)
     */
    protected $dateDebut;

    /**
     * @ORM\Column(name="dateFin", type="dateTime", nullable=false)
     */
    protected $dateFin;

    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Film", inversedBy="festivals")
     * @ORM\JoinTable(name="cin_festival_film")
     */
    protected $films;

    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\CourtMetrage", inversedBy="festivals")
     * @ORM\JoinTable(name="cin_festival_courtmetrage")
     */
    protected $courtMetrages;

    /**
     * @ORM\Column(name="description", type="text", length=255, nullable=false)
     */
    protected $description;

    public function __construct(){
        $this->films = new ArrayCollection();
        $this->courtMetrages = new ArrayCollection();
    }

    public function getId(){
    	return $this->id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function getNom() {
        return $this->nom;
    }

    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;
    }
    public function getDateDebut() {
        return $this->dateDebut;
    }

    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;
    }
    public function getDateFin() {
        return $this->dateFin;
    }

    public function setFilms($films) {
        $this->films = $films;
    }
    public function getFilms() {
        return $this->films;
    }

    public function setCourtMetrages($courtMetrages) {
        $this->courtMetrages = $courtMetrages;
    }
    public function getcourtMetrages() {
        return $this->courtMetrages;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    public function getDescription() {
        return $this->description;
    }	
}