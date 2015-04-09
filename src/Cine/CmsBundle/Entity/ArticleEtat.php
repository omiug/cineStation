<?php

namespace Cine\CmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ArticleEtat
 *
 * @ORM\Table(name="cms_article_etat")
 * @ORM\Entity(repositoryClass="Cine\CmsBundle\Repository\ArticleEtatRepository")
 * @Gedmo\SoftDeleteable(fieldName="dateSuppr")
 */
class ArticleEtat
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
     * @Assert\NotBlank()
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    protected $nom;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bloquant", type="boolean")
     */
    private $bloquant;

    /**
     * @ORM\Column(name="dateSuppr", type="datetime", nullable=true)
     */
    private $dateSuppr;

    public function getId() {
        return $this->id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setBloquant($bloquant) {
        $this->bloquant = $bloquant;
    }

    public function getBloquant() {
        return $this->bloquant;
    }

    public function setDateSuppr($dateSuppr)
    {
        $this->dateSuppr = $dateSuppr;
    }

    public function getDateSuppr()
    {
        return $this->dateSuppr;
    }
}