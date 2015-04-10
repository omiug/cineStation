<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}