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
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Festival", mappedBy="film")
     */
    protected $festivals;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media",  cascade={"persist"})
     *
     */
    protected $poster;

    /**
     * @ORM\Column(name="critique", type="text", nullable=false)
     */
    protected $critique;

    /**
     * @ORM\Column(name="bonPoint", type="text", nullable=false)
     */
    protected $bonPoint;

    /**
     * @ORM\Column(name="mauvaisPoint", type="text", nullable=false)
     */
    protected $mauvaisPoint;

    public function __construct(){
    	$this->festivals = new ArrayCollection();
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

    public function setBandeAnnonce($bandeAnnonce) {
        $this->bandeAnnonce = $bandeAnnonce;
    }
    public function getBandeAnnonce() {
        return $this->bandeAnnonce;
    }

    public function setPoster($poster) {
        $this->poster = $poster;
    }
    public function getPoster() {
        return $this->poster;
    }

    public function setCritique($critique) {
        $this->critique = $critique;
    }
    public function getCritique() {
        return $this->critique;
    }

    public function setBonPoint($bonPoint) {
        $this->bonPoint = $bonPoint;
    }
    public function getBonPoint() {
        return $this->bonPoint;
    }

    public function setMauvaisPoint($mauvaisPoint) {
        $this->mauvaisPoint = $mauvaisPoint;
    }
    public function getMauvaisPoint() {
        return $this->mauvaisPoint;
    }
}