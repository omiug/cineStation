<?php

namespace Cine\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

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
     * @ORM\ManyToMany(targetEntity="Groupe")
     * @ORM\JoinTable(name="usr_user_groupe",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="groupe_id", referencedColumnName="id")}
     * )
     */
    protected $groups;
    
    /**
     *
     * @ORM\Column(name="civilite", type="string", length=3)
     */
    protected $civilite;


    /**
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    
    /**
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    protected $prenom;

    public function getId() {
        return $this->id;
    }
    
    public function __construct() {
        parent::__construct();
        $this->groupes = new ArrayCollection();
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
}