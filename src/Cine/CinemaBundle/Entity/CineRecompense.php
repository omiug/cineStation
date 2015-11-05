<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class CineRecompense extends GlobalRecompense{
    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Film", inversedBy="filmRecompenses", cascade={"persist"})
     * @ORM\JoinColumn(name="film_id", referencedColumnName="id", nullable=true)
     */
    private $film;

    public function setFilm(Film $film) {
        $this->film = $film;
    }

    public function getFilm() {
        return $this->film;
    }
}