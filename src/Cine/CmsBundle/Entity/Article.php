<?php

namespace Cine\CmsBundle\Entity;

use Cine\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Article
 *
 * @ORM\Table(name="cms_article")
 * @ORM\Entity(repositoryClass="Cine\CmsBundle\Repository\ArticleRepository")
 * @Gedmo\SoftDeleteable(fieldName="dateSuppr")
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="contenu", type="text",nullable=true)
     */
    private $contenu;

    /**
     * @var array
     *
     * @ORM\Column(name="bons_points", type="array")
     */
    private $bonsPoints;

    /**
     * @var array
     *
     * @ORM\Column(name="mauvais_points", type="array")
     */
    private $mauvaisPoints;

    /**
     * @var integer
     *
     * @ORM\Column(name="cptLike", type="integer", nullable=true)
     */
    private $cptLike;

    /**
     * @ORM\ManyToOne(targetEntity="Cine\UserBundle\Entity\User", inversedBy="articles")
     * @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     */
    private $auteur;


    /**
     * @ORM\ManyToOne(targetEntity="Cine\CinemaBundle\Entity\Film", inversedBy="articles")
     * @ORM\JoinColumn(name="film_id", referencedColumnName="id")
     */
    private $film;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cine\CinemaBundle\Entity\Serie", inversedBy="articles")
     * @ORM\JoinColumn(name="serie_id", referencedColumnName="id")
     */
    private $serie;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cine\CinemaBundle\Entity\CourtMetrage", inversedBy="articles")
     * @ORM\JoinColumn(name="cm_id", referencedColumnName="id")
     */
    private $courtMetrage;
    
    /**
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(name="dateModification", type="datetime", nullable=true)
     */
    private $dateModification;

    /**
     * @ORM\Column(name="dateSuppr", type="datetime", nullable=true)
     */
    private $dateSuppr;

    public function getId() {
        return $this->id;
    }
   
    public function getTitre() {
        return $this->titre;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getBonsPoints() {
        return $this->bonsPoints;
    }

    public function getMauvaisPoints() {
        return $this->mauvaisPoints;
    }

    public function getCptLike() {
        return $this->cptLike;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function getFilm() {
        return $this->film;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function getCourtMetrage() {
        return $this->courtMetrage;
    }

    public function getDateCreation() {
        return $this->dateCreation;
    }

    public function getDateModification() {
        return $this->dateModification;
    }

    public function getDateSuppr() {
        return $this->dateSuppr;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
        return $this;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
        return $this;
    }

    public function setBonsPoints($bonsPoints) {
        $this->bonsPoints = $bonsPoints;
        return $this;
    }

    public function setMauvaisPoints($mauvaisPoints) {
        $this->mauvaisPoints = $mauvaisPoints;
        return $this;
    }

    public function setCptLike($cptLike) {
        $this->cptLike = $cptLike;
        return $this;
    }

    public function setAuteur(User $auteur) {
        $this->auteur = $auteur;
        return $this;
    }

    public function setFilm(\Cine\CinemaBundle\Entity\Film $film) {
        $this->film = $film;
        return $this;
    }

    public function setSerie(\Cine\CinemaBundle\Entity\Serie $serie) {
        $this->serie = $serie;
        return $this;
    }

    public function setCourtMetrage(\Cine\CinemaBundle\Entity\CourtMetrage $courtMetrage) {
        $this->courtMetrage = $courtMetrage;
        return $this;
    }

    public function setDateCreation(\DateTime $dateCreation) {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    public function setDateModification(\DateTime $dateModification) {
        $this->dateModification = $dateModification;
        return $this;
    }

    public function setDateSuppr($dateSuppr) {
        $this->dateSuppr = $dateSuppr;
        return $this;
    }


    
}