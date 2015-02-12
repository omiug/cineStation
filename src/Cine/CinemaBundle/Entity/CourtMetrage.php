<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\CourtMetrageRepository")
 * @ORM\Table(name="cin_cm")
 */
class CourtMetrage extends cinema{
	/**
     * @ORM\Column(name="cadreRealisation", type="string", nullable=false)
     */
    protected $cadreRealisation;   
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Festival", MappedBy="courtMetrage")
     */
    protected $festival;  

    protected $videocm; 

    public function __construct(){
        $this->festival = new ArrayCollection();
    }

    public function setCadreRealisation($cadreRealisation) {
        $this->cadreRealisation = $cadreRealisation;
    }
    public function getCadreRealisation() {
        return $this->cadreRealisation;
    }

    public function setFestival($Festival){
        $this->Festival = $Festival;
    }
    public function getFestival(){
        return $this->Festival
    }

    public function setVideoCm($videocm) {
        $this->videocm = $videocm;
    }
    public function getVideoCm() {
        return $this->videocm;
    }
}