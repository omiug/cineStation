<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\GenreRepository")
 * @ORM\Table(name="cin_genre")
 * @UniqueEntity("nom")
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
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\CourtMetrage", mappedBy="genres")
     */
    protected $courtMetrages;

    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Film", mappedBy="genres")
     */
    protected $films;

    /**
     * @ORM\ManyToMany(targetEntity="Cine\CinemaBundle\Entity\Serie", mappedBy="genres")
     */
    protected $series;

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
}