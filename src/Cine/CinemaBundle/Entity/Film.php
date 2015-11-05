<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
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
     * @ORM\Column(name="dureeFilm", type="integer",  nullable=false)
     */
    protected $dureeFilm;
    
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
    
    /**
     * @ORM\OneToMany(targetEntity="CineRecompense", mappedBy="film", cascade={"persist"})
     */
    protected $filmRecompenses;
    
    /**
     * @ORM\OneToMany(targetEntity="Cine\CmsBundle\Entity\Article", mappedBy="film", cascade={"persist"})
     */
    protected $articles;

    public function __construct(){
        parent::__construct();
        
    	$this->articles = new ArrayCollection();
    	$this->festivals = new ArrayCollection();
        $this->dureeFilm = 120;
    }

    public function setFestivals($festivals){
        foreach ($festivals as $fest) {
            $this->addFestival($fest);
        }
        return $this;
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
        return $this;
    }
    public function getBandeAnnonce() {
        return $this->bandeAnnonce;
    }

    public function setPoster($poster) {
        $this->poster = $poster;
        return $this;
    }

    public function getPoster() {
        return $this->poster;
    }

    public function setGenres($genres) {
        foreach ($genres as $gre) {
            $this->addGenre($gre);
        }
        return $this;
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
        return $this;
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

    public function setFilmRecompenses($recompenses) {
        foreach ( $recompenses as $rec ) {
            $this->addFilmRecompense($rec);
        }
        return $this;
    }

    public function getFilmRecompenses() {
        return $this->filmRecompenses;
    }

    public function addFilmRecompense(CineRecompense $rec) {
        $this->filmRecompenses[] = $rec;
    }

    public function removeFilmRecompense(CineRecompense $rec) {
        $this->filmRecompenses->removeElement($rec);
    }
    
    public function addArticle(\Cine\CmsBundle\Entity\Article $article) {
        $this->articles[] = $article;
    }
    
    public function setArticles($articles) {
        foreach ( $artciles as $article ) {
            $this->addArticle($article);
        }
    }
    
    public function getArticle() {
        return $this->articles;
    }
    
    public function removeArticles(\Cine\CmsBundle\Entity\Article $article) {
         $this->articles->removeElement($article);
   }
}