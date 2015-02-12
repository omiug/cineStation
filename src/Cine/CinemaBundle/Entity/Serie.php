<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\SerieRepository")
 * @ORM\Table(name="cin_serie")
 */
class Serie extends Cinema{
    /**
     * @ORM\Column(name="formatTemp", type="int", nullable=false)
     */
    protected $formatTemp; 
    /**
     * @ORM\Column(name="formatEpisode", type="int", nullable=false)
     */
    protected $formatEpisode; 
    /**
     * @ORM\Column(name="saisons", type="array", nullable=false)
     */
    protected $saisons; 

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
}