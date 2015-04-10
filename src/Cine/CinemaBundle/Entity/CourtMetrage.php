<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\CourtMetrageRepository")
 * @ORM\Table(name="cin_cm")
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

    protected $videocm; 

    public function __construct(){
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
}