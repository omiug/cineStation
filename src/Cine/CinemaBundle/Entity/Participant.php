<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\ParticipantRepository")
 * @ORM\Table(name="cin_participant")
 */
class Participant 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Cine\CinemaBundle\Entity\CourtMetrage", inversedBy="participants")
     * @ORM\JoinTable(name="cin_cm_participant")
     */
    protected $courtMetrages;

    /**
     * @ORM\ManyToOne(targetEntity="Cine\CinemaBundle\Entity\Film", inversedBy="participants")
     * @ORM\JoinTable(name="cin_film_participant")
     */
    protected $films;

    /**
     * @ORM\ManyToOne(targetEntity="Cine\CinemaBundle\Entity\Serie", inversedBy="participants")
     * @ORM\JoinTable(name="cin_serie_participant")
     */
    protected $series;

    /**
     * @ORM\ManyToOne(targetEntity="Cine\CinemaBundle\Entity\Cast", inversedBy="participants")
     * @ORM\JoinTable(name="cin_participant_cast")
     */
    protected $cast; 	

    /**
     * @ORM\ManyToOne(targetEntity="Cine\CinemaBundle\Entity\Type", inversedBy="participants")
     * @ORM\JoinTable(name="cin_participant_type")
     */
    protected $type; 

    public function setCast($cast){
    	$this->cast = $cast;
    }
    public function getCast(){
    	return $this->cast;
    }

    public function setType($type){
    	$this->type = $type;
    }
    public function getType(){
    	return $this->type;
    }	

}