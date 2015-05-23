<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\FilmRepository")
 * @ORM\Table(name="cin_film")
 * @UniqueEntity("bandeAnnonce")
 */
class Film extends Cinema
{
    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media",  cascade={"persist"})
     */
    protected $poster;

    /**
     * @Assert\Url()
     * @ORM\Column(name="bandeAnnonce", type="text", nullable=true)
     */
    protected $bandeAnnonce;
    
    /**
     * @ORM\Column(name="dureeFilm", type="time",  nullable=false)
     */
    protected $dureeFilm;

    /**
     * @ORM\OneToMany(targetEntity="FilmRecompense", mappedBy="film", cascade={"persist"})
     */
    protected $filmRecompenses;
    
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Genre", inversedBy="films")
     * @ORM\JoinTable(name="cin_film_genre")
     */
    protected $genres;

    
    
    
    
    
    
    /**
     * @ORM\OneToMany(targetEntity="Cine\CinemaBundle\Entity\Participant", mappedBy="films")
     */
    protected $participants;

    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Festival", mappedBy="films")
     */
    protected $festivals;
    
    
    
//    protected $critique;
//    protected $bonPoint;
//    protected $mauvaisPoint;

    public function __construct(){
    	$this->festivals = new ArrayCollection();
        $this->filmRecompenses = new ArrayCollection();
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
    
    public function setFilmRecompenses($recomps){
        foreach ($recomps as $rec) {
            $this->addFilmRecompense($fest);
        }
    }
    public function getFilmRecompenses() {
        return $this->filmRecompenses;
   }

    public function addFilmRecompense(FilmRecompense $rec) {
        $this->filmRecompenses[] = $rec;
    }

    public function removeFilmRecompense(FilmRecompense $rec) {
        $this->filmRecompenses->removeElement($rec);
    }    
}