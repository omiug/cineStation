<?php

namespace Cine\UserBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroupe;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Cine\UserBundle\Repository\GroupeRepository")
 * @ORM\Table(name="usr_groupe")
 */

class Groupe extends BaseGroupe {
    const DEFAULT_GROUPE = 2;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Cine\UserBundle\Entity\User", mappedBy="groups")
     */
    protected $users;


    public function __construct($name, $roles = array()) {
        parent::__construct($name, $roles);
        
        $this->users = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function setUsers($users){
        $this->users=$users;
        
        return $this;
    }

    public function getUsers(){
        return $this->users;
    }
}