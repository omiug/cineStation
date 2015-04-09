<?php

namespace Cine\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Cine\UserBundle\Repository\UserRepository")
 * @ORM\Table(name="usr_user")
 */

class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Cine\UserBundle\Entity\Groupe", inversedBy="users")
     * @ORM\JoinTable(name="usr_user_groupe")
     */
    protected $groups;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=80, nullable=false)
     */
    protected $civilite;


    /**
     *
     * @var string $nom
     * @Assert\NotBlank()
     * @ORM\Column(name="nom", type="string", length=255,nullable=false)
     */
    protected $nom;

    /**
     * @var string $prenom
     * @Assert\NotBlank()
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    protected $prenom;

    /**
     * @ORM\ManyToOne(targetEntity="Famille", inversedBy="users", cascade={"persist"})
     * @ORM\JoinColumn(name="famille_id", referencedColumnName="id", nullable=true)
     */
    private $famille;

    /**
     * @ORM\OneToMany(targetEntity="Cine\CmsBundle\Entity\Article", mappedBy="auteur", cascade={"persist"})
     */
    private $articles;

    public function __construct() {
        parent::__construct();
        $this->groups = new ArrayCollection();
        $this->articles = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function setCivilite($civ) {
        $this->civilite = $civ;
    }

    public function getCivilite() {
        return $this->civilite;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setGroups($groups) {
        $this->groups = $groups;
    }

    public function getGroups() {
        return $this->groups;
    }

    public function setFamille(Famille $famille) {
        $this->famille = $famille;
    }

    public function getFamille() {
        return $this->famille;
    }

    public function getArticles() {
        return $this->articles;
    }
}