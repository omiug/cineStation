<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Serie extends Cinema{
    /**
     * @ORM\Column(name="formatTemp", type="integer", nullable=false)
     */
    protected $formatTemp; 
    /**
     * @ORM\Column(name="formatEpisode", type="integer", nullable=false)
     */
    protected $formatEpisode; 
    /**
     * @ORM\Column(name="saisons", type="array", nullable=false)
     */
    protected $saisons; 

    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Genre", inversedBy="series")
     * @ORM\JoinTable(name="cin_serie_genre")
     */
    protected $genres;

    /**
     * @ORM\OneToMany(targetEntity="Cine\CinemaBundle\Entity\Participant", mappedBy="series")
     */
    protected $participants;
    
    /**
     * @ORM\OneToMany(targetEntity="Cine\CmsBundle\Entity\Article", mappedBy="serie", cascade={"persist"})
     */
    protected $articles;

    public function __construct() {
        parent::__construct();

        $this->articles = new ArrayCollection();
    }

    public function setFormatTemp($formatTemp) {
        $this->formatTemp = $formatTemp;
    }

    public function getFormatTemp() {
        return $this->formatTemp;
    }

    public function setFormatEpisode($formatEpisode) {
        $this->formatEpisode = $formatEpisode;
    }

    public function getFormatEpisode() {
        return $this->formatEpisode;
    }

    public function setSaison($saison) {
        $this->saison = $saison;
    }

    public function getSaison() {
        return $this->saison;
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