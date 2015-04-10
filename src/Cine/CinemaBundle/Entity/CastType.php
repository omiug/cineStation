<?php


namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\TypeRepository")
 * @ORM\Table(name="cin_cast_type")
 */
class CastType
{

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
     * @ORM\OneToMany(targetEntity="Cine\CinemaBundle\Entity\Participant", mappedBy="type")
     */
    protected $participants; 

    public function __construct(){
    	$this->participants = new ArrayCollection();
    }

    public function setNom($nom){
    	$this->nom = $nom;
    }
    public function getNom(){
    	return $this->nom;
    }

    public function getParticipants() {
        return $this->participants;
    }
}