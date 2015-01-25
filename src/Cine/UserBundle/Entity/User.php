<?php

namespace Cine\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToMany(targetEntity="Cine\UserBundle\Entity\Groupe")
     * @ORM\JoinTable(name="usr_user_groupe",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="groupe_id", referencedColumnName="id")}
     * )
     */
    protected $groups;
    
    public function getId() {
        return $this->id;
    }
    
    public function __construct() {
        parent::__construct();
        $this->groupes = new ArrayCollection();
    }
}