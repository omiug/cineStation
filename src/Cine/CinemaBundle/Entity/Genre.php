<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\GenreRepository")
 * @ORM\Table(name="cin_genre")
 */
class Genre{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id; 
    /**
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    protected $nom;
    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Cinema", mappedBy="genres")
     */
    protected $cinemas;  

    public function __construct(){
    	$this->cinemas = new ArrayCollection();
    }

    public function getId(){
        return $this->id;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getNom(){
        return $this->nom;
    }	

    public function setCinemas($cinemas){
        foreach ($cinemas as $cine) {
            $this->addCinema($cine);
        }
    }
    public function getCinemas() {
        return $this->cinemas;
    }

    public function addCinema(Cinema $cine) {
        $this->cinemas = $cine;
    }

    public function removeCinema(Cinema $cine) {
        $this->cinemas->removeElement($cine);
    }
}