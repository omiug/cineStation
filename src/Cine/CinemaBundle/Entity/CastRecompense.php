<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="cin_cast_recompense")
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\CastRecompenseRepository")
 */
class CastRecompense extends GlobalRecompense{
    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Cast", inversedBy="castRecompenses", cascade={"persist"})
     * @ORM\JoinColumn(name="cast_id", referencedColumnName="id", nullable=false)
     */
    private $cast;

    public function setCast(Cast $cast) {
        $this->cast = $cast;
    }

    public function getCast() {
        return $this->cast;
    }
}