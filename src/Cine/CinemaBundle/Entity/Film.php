<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\FilmRepository")
 * @ORM\Table(name="cin_film")
 */
class Film extends Cinema
{
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Genre", inversedBy="films")
     * @ORM\JoinTable(name="cin_film_genre")
     */
    protected $genres;

    /**
     * @ORM\OneToMany(targetEntity="Cine\CinemaBundle\Entity\Participant", mappedBy="films")
     */
    protected $participants;
    
    protected $bandeAnnonce;

    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Festival", mappedBy="films")
     */
    protected $festivals;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media",  cascade={"persist"})
     *
     */
    protected $poster;

    /**
     * @ORM\Column(name="critique", type="text", nullable=false)
     */
    protected $critique;

    /**
     * @ORM\Column(name="bonPoint", type="text", nullable=false)
     */
    protected $bonPoint;

    /**
     * @ORM\Column(name="mauvaisPoint", type="text", nullable=false)
     */
    protected $mauvaisPoint;

    /**
     * @ORM\Column(name="dureeFilm", type="time",  nullable=false)
     */
    protected $dureeFilm;

    public function __construct(){
    	$this->festivals = new ArrayCollection();
    }

    public function setFestivals($festivals){
        foreach ($festivals as $fest) {
            $this->addFestival($fest);
        }
    }
    public function getFestivals() {
        return $this->festivals;
   }

    public function addFestival(Festival $fest) {
        $this->festivals = $fest;
    }

    public function removeFestival(Festival $fest) {
        $this->festivals->removeElement($fest);
    }

    public function setBandeAnnonce($bandeAnnonce) {
        $this->bandeAnnonce = $bandeAnnonce;
    }
    public function getBandeAnnonce() {
        return $this->bandeAnnonce;
    }

    public function setPoster($poster) {
        $this->poster = $poster;
    }
    public function getPoster() {
        return $this->poster;
    }

    public function setCritique($critique) {
        $this->critique = $critique;
    }
    public function getCritique() {
        return $this->critique;
    }

    public function setBonPoint($bonPoint) {
        $this->bonPoint = $bonPoint;
    }
    public function getBonPoint() {
        return $this->bonPoint;
    }

    public function setMauvaisPoint($mauvaisPoint) {
        $this->mauvaisPoint = $mauvaisPoint;
    }
    public function getMauvaisPoint() {
        return $this->mauvaisPoint;
    }

    public function setGenres($genres) {
        foreach ($genres as $gre) {
            $this->addGenre($gre);
        }
    }

    public function getGenres() {
        return $this->genres;
    }

    public function addGenre(Genre $genre) {
        $this->genres[] = $genre;
    }

    public function removeGenre(Genre $genre) {
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

    public function setDureeFilm($dureeFilm) {
        $this->dureeFilm = $dureeFilm;
    }

    public function getDureeFilm() {
        return $this->dureeFilm;
    }
}