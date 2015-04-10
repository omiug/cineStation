<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\RecompenseRepository")
 * @ORM\Table(name="cin_recompense")
 * @UniqueEntity("nom")
 */
class Recompense{

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
     * @ORM\Column(name="type", type="integer", length=4)
     */
    protected $type;

    /**
     * @ORM\OneToMany(targetEntity="CastRecompense", mappedBy="recompense", cascade={"persist"})
     */
    protected $castRecompenses;

    public function __toString()
    {
        return $this->nom;
    }

    public function getId() {
        return $this->id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }

    public function getCastRecompenses() {
        return $this->castRecompenses;
    }
}