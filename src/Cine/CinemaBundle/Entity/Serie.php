<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\SerieRepository")
 * @ORM\Table(name="cin_serie")
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
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Genre", inversedBy="films")
     * @ORM\JoinTable(name="cin_serie_genre")
     */
    protected $genres;

    /**
     * @ORM\OneToMany(targetEntity="Cine\CinemaBundle\Entity\Participant", mappedBy="series")
     */
    protected $participants;

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
}