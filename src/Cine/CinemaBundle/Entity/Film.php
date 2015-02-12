<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\FilmRepository")
 * @ORM\Table(name="cin_film")
 */
class Film extends Cinema{

    protected $bandeAnnonce;

    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Festival", MappedBy="film")
     */
    protected $festivals;

    public function __construct(){
    	$this->festivals = new ArrayCollection();
    }

    public function setFestivals($festivals) {
        $this->festivals = $festivals;
    }
    public function getFestivals() {
        return $this->festivals;
    }

    public function setBandeAnnonce($bandeAnnonce) {
        $this->bandeAnnonce = $bandeAnnonce;
    }
    public function getBandeAnnonce() {
        return $this->bandeAnnonce;
    }
}