<?php

namespace Cine\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Cine\UserBundle\Repository\TypeRepository")
 * @ORM\Table(name="usr_famille")
 */

class Famille {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @var string $label
     * @Assert\NotBlank()
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    protected $label;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="famille", cascade={"persist"})
     */
    private $users;

    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->label;
    }

    public function getId() {
        return $this->id;
    }

    public function setLabel($label) {
         $this->label = $label;
    }

    public function getLabel() {
        return $this->label;
    }

    public function addUser(User $user) {
        $this->users[] = $user;
    }

    public function removeDetail(User $user) {
        $this->users->removeElement($user);
    }

    public function setUsers(\Doctrine\Common\Collections\ArrayCollection $users) {
        foreach ($users as $user ) {
            $this->addUser($user);
        }
    }

    public function getUsers() {
        return $this->users;
    }
}