<?php


namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\TypeRepository")
 * @ORM\Table(name="cin_type")
 */
class Type
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
    	$this->participant = new ArrayCollection();
    }

    public function setNom($nom){
    	$this->nom = $nom;
    }
    public function getNom(){
    	return $this->nom;
    }

    public function setParticipants($participants){
        foreach ($participants as $membre) {
            $this->addParticipant($membre);
        }
    }
    public function getParticipants() {
        return $this->participants;
    }

    public function addParticipant(Participant $membre) {
        $this->participants = $membre;
    }

    public function removeParticipant(Participant $membre) {
        $this->participants->removeElement($membre);
    }

}