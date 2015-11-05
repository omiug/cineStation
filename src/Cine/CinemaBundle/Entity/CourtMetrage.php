<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class CourtMetrage extends Cinema
{
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Genre", inversedBy="courtMetrages")
     * @ORM\JoinTable(name="cin_cm_genre")
     */
    protected $genres;

    /**
     * @ORM\OneToMany(targetEntity="Cine\CinemaBundle\Entity\Participant", mappedBy="courtMetrages")
     */
    protected $participants;

	/**
     * @ORM\Column(name="cadreRealisation", type="string", nullable=false)
     */
    protected $cadreRealisation;   
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Festival", mappedBy="courtMetrages")
     */
    protected $festivals;  
    
    /**
     * @ORM\OneToMany(targetEntity="Cine\CmsBundle\Entity\Article", mappedBy="courtMetrage", cascade={"persist"})
     */
    protected $articles;

    protected $videocm; 

    public function __construct(){
        parent::__construct();

        $this->articles = new ArrayCollection();
        $this->festivals = new ArrayCollection();
    }

    public function setCadreRealisation($cadreRealisation) {
        $this->cadreRealisation = $cadreRealisation;
    }
    public function getCadreRealisation() {
        return $this->cadreRealisation;
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

    public function setVideoCm($videocm) {
        $this->videocm = $videocm;
    }
    public function getVideoCm() {
        return $this->videocm;
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