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


    private $cinema;

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

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function setBonsPoints(array $ar) {
        $this->bonsPoints = $ar;
    }

    public function getBonsPoints() {
        return $this->bonsPoints;
    }

    public function setMauvaisPoints(array $ar) {
        $this->mauvaisPoints = $ar;
    }

    public function getMauvaisPoints() {
        return $this->mauvaisPoints;
    }

    public function setCptLike($cpt) {
        $this->cptLike = $cpt;
    }

    public function getCptLike() {
        return $this->cptLike;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setDateSuppr($dateSuppr)
    {
        $this->dateSuppr = $dateSuppr;
    }

    public function getDateSuppr()
    {
        return $this->dateSuppr;
    }

    public function setAuteur(User $user) {
        $this->auteur = $user;
    }

    public function getAuteur() {
        return $this->auteur;
    }
    
    public function setDateCreation($date) {
        $this->dateCreation = $date;
    }

    public function getDateCreation() {
        return $this->dateCreation;
    }

    public function setDateModification($date) {
        $this->dateModification = $date;
    }

    public function getDateModification() {
        return $this->dateModification;
    }

    public function setCinema(Cinema $cinema) {
        $this->cinema = $cinema;
    }

    public function getCinema() {
        return $this->cinema;
    }
}