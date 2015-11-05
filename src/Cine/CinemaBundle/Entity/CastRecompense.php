<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class CastRecompense extends GlobalRecompense{
    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Cast", inversedBy="castRecompenses", cascade={"persist"})
     * @ORM\JoinColumn(name="cast_id", referencedColumnName="id", nullable=true)
     */
    private $cast;

    public function setCast(Cast $cast) {
        $this->cast = $cast;
    }

    public function getCast() {
        return $this->cast;
    }
}