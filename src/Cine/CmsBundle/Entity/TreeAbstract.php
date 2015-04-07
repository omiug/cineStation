<?php

namespace Cine\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 *  @ORM\HasLifecycleCallbacks
 *  @ORM\MappedSuperclass
 *  @Gedmo\SoftDeleteable(fieldName="dateSuppr")
 */
abstract class TreeAbstract
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modification", type="datetime")
     */
    private $dateModification;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="titre", type="string", length=255,nullable=false)
     */
    private $titre;

    /**
     * @ORM\Column(name="dateSuppr", type="datetime", nullable=true)
     */
    private $dateSuppr;

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setDateModification(new DateTime());
        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        if (null === $this->getId()) {
            $this->setDateCreation(new \DateTime());
        }
        $this->setDateModification(new \DateTime());
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;
    }

    public function getDateModification()
    {
        return $this->dateModification;
    }

    public function getDateSuppr()
    {
        return $this->dateSuppr;
    }

    public function setDateSuppr($dateSuppr)
    {
        $this->dateSuppr = $dateSuppr;
    }
}