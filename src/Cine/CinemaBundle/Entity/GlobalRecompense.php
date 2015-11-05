<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="cine_recompense_asso")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"cine" = "CineRecompense", "cast" = "CastRecompense"})
 */
class GlobalRecompense {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Recompense", inversedBy="globalRecompenses")
     * @ORM\JoinColumn(name="recompense_id", referencedColumnName="id", nullable=false)
     */
    private $recompense;

    /**
     * @Assert\Length(
     *      min = "4",
     *      max = "4",
     *      minMessage = "La date ne peux pas faire mois de {{ limit }} caractères.",
     *      maxMessage = "La date ne peux pas faire plus de {{ limit }} caractères."
     * )
     *
     * @ORM\Column(name="annee", type="integer", length=4)
     */
    protected $annee;
    
    
    public function __construct() {
        $dateTime = new \DateTime();
        $this->annee = intval($dateTime->format('Y'));
    }

    public function setRecompense(Recompense $rec) {
        $this->recompense = $rec;
    }

    public function getRecompense() {
        return $this->recompense;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    public function getAnnee() {
        return $this->annee;
    }
}