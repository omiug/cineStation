<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="cin_film_recompense")
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\CastRecompenseRepository")
 */
class FilmRecompense extends GlobalRecompense{
    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Film", inversedBy="filmRecompenses", cascade={"persist"})
     * @ORM\JoinColumn(name="film_id", referencedColumnName="id", nullable=false)
     */
    private $cinema;

    public function setCinema(Cinema $cinema) {
        $this->cinema = $cinema;
    }

    public function getCinema() {
        return $this->cinema;
    }
}