<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\CourtMetrageRepository")
 * @ORM\Table(name="cin_cm")
 */
class CourtMetrage extends Cinema{
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
}