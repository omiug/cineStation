<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\FilmRepository")
 * @ORM\Table(name="cin_film")
 */
class Film extends Cinema{

    protected $bandeAnnonce;
	/**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Festival", MappedBy="film")
     */
    protected $festival;

    public function __construct(){
    	$this->festival = new ArrayCollection();
    }

    public function setFestival($festival) {
        $this->festival = $festival;
    }
    public function getFestival() {
        return $this->festival;
    }

    public function setBandeAnnonce($bandeAnnonce) {
        $this->bandeAnnonce = $bandeAnnonce;
    }
    public function getBandeAnnonce() {
        return $this->bandeAnnonce;
    }
}