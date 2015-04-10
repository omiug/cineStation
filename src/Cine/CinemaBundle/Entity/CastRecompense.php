<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="cin_cast_recompense")
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\CastRecompenseRepository")
 */
class CastRecompense {

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
     * @ORM\ManyToOne(targetEntity="Cast", inversedBy="castRecompenses", cascade={"persist"})
     * @ORM\JoinColumn(name="cast_id", referencedColumnName="id", nullable=false)
     */
    private $cast;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Recompense", inversedBy="castRecompenses")
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

    public function setCast(Cast $cast) {
        $this->cast = $cast;
    }

    public function getCast() {
        return $this->cast;
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