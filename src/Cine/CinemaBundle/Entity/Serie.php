<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Serie extends Cinema{
    /**
     * @ORM\Column(name="formattemp", type="int", nullable=false)
     */
    protected $formattemp; 
    /**
     * @ORM\Column(name="formatepisode", type="int", nullable=false)
     */
    protected $formatepisode; 
    /**
     * @ORM\Column(name="saisons", type="array", nullable=false)
     */
    protected $saisons; 

    public function setFormatTemp($formattemp) {
        $this->formattemp = $formattemp;
    }
    public function getFormatTemp() {
        return $this->formattemp;
    }

    public function setFormatEpisode($formatepisode) {
        $this->formatepisode = $formatepisode;
    }
    public function getFormatEpisode() {
        return $this->formatepisode;
    }

    public function setSaison($saison) {
        $this->saison = $saison;
    }
    public function getSaison() {
        return $this->saison;
    }
}
?>