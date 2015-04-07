<?php

namespace Cine\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MenuItem
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\Tree(type="nested")
 * @Gedmo\SoftDeleteable(fieldName="dateSuppr")
 * @ORM\Table(name="cms_menu_item")
 * @ORM\Entity(repositoryClass="Cine\CmsBundle\Repository\MenuItemRepository")
 */
class MenuItem
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="RouteName", type="string", length=255, nullable=true)
     */
    private $routeName;

    /**
     * @var array
     *
     * @ORM\Column(name="RouteParameter", type="array", nullable=true)
     */
    private $routeParameter;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=255, nullable=true)
     */
    private $uri;

    /**
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="menuItems", cascade={"persist"})
     */
    private $menu;

    /**
     * @Gedmo\TreeLeft
     * @ORM\Column(name="lft", type="integer")
     */
    private $lft;

    /**
     * @Gedmo\TreeLevel
     * @ORM\Column(name="lvl", type="integer")
     */
    private $lvl;

    /**
     * @Gedmo\TreeRight
     * @ORM\Column(name="rgt", type="integer")
     */
    private $rgt;

    /**
     * @Gedmo\TreeRoot
     * @ORM\Column(name="root", type="integer", nullable=true)
     */
    private $root;

    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="MenuItem", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="MenuItem", mappedBy="parent", cascade={"persist"})
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    private $children;

    /**
     * @var array
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(name="dateSuppr", type="datetime", nullable=true)
     */
    private $dateSuppr;


    public function getId()
    {
        return $this->id;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setRouteName($routeName)
    {
        $this->routeName = $routeName;
    }

    public function getRouteName()
    {
        return $this->routeName;
    }

    public function setRouteParameter($routeParameter)
    {
        $this->routeParameter = $routeParameter;
    }

    public function getRouteParameter()
    {
        return $this->routeParameter;
    }

    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function setMenu($menu = null)
    {
        $this->menu = $menu;
    }

    public function getMenu()
    {
        return $this->menu;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function setChildren($children)
    {
        $this->children = $children;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function __toString()
    {
        return $this->getTitre();
    }

    /**
     * @ORM\PrePersist
     */
    public function setDefaultFields()
    {
        return $this;
    }

    public function getDateSuppr()
    {
        return $this->dateSuppr;
    }

    public function setDateSuppr($dateSuppr)
    {
        $this->dateSuppr = $dateSuppr;
    }

    public function getLvl()
    {
        return $this->lvl;
    }

    public function getRgt()
    {
        return $this->rgt;
    }

    public function getLft()
    {
        return $this->lft;
    }
}