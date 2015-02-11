<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class CourtMetrage extends cinema{
	/**
     * @ORM\Column(name="cadrerealisation", type="string", nullable=false)
     */
    protected $cadrerealisation;     

    protected $videocm; 

    public function setCadreRealisation($cadrerealisation) {
        $this->cadrerealisation = $cadrerealisation;
    }
    public function getCadreRealisation() {
        return $this->cadrerealisation;
    }

    public function setVideoCm($videocm) {
        $this->videocm = $videocm;
    }
    public function getVideoCm() {
        return $this->videocm;
    }


}
?>