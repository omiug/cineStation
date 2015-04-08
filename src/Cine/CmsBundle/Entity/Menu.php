<?php

namespace Cine\CmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="cms_menu")
 * @ORM\Entity(repositoryClass="Cine\CmsBundle\Repository\MenuRepository")
 */
class Menu extends TreeAbstract
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;

    /**
     * @ORM\OneToMany(targetEntity="MenuItem", mappedBy="menu", cascade={"persist"}, orphanRemoval=true)
     */
    private $menuItems;

    public function __construct()
    {
        $this->menuItems = new ArrayCollection();
        $this->actif = true;
    }

    public function __toString()
    {
        return $this->getTitre();
    }

    public function getActif()
    {
        return $this->actif;
    }

    public function setActif($actif)
    {
        $this->actif = $actif;
    }

    public function addMenuItem(MenuItem $menuItems)
    {
        $this->menuItems[] = $menuItems;
        return $this;
    }

    public function removeMenuItem(MenuItem $menuItems)
    {
        $this->menuItems->removeElement($menuItems);
    }

    public function getMenuItems()
    {
        return $this->menuItems;
    }

    public function setMenuItems($menuItems)
    {
        $this->menuItems = $menuItems;
    }
}