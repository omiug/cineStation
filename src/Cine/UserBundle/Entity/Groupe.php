<?php

namespace Cine\UserBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroupe;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Cine\UserBundle\Repository\GroupeRepository")
 * @ORM\Table(name="usr_groupe")
 */

class Groupe extends BaseGroupe {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    public function getId() {
        return $this->id;
    }
    
    public function __construct($name, $roles = array()) {
        parent::__construct($name, $roles);
    }
}