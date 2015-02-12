<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Film extends Cinema{

    protected $bandeannonce;


    public function setBandeAnnonce($bandeannonce) {
        $this->bandeannonce = $bandeannonce;
    }

    public function getBandeAnnonce() {
        return $this->bandeannonce;
    }
}