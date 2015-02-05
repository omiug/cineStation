<?php

namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\GroupeRepository")
 * @ORM\Table(name="usr_groupe")
 */

class Cinema extends BaseGroupe {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;    
    /**
     * @ORM\titre
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $titre; 
    /**
     * @ORM\AnneeReal
     * @ORM\Column(type="dateTime")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $AnneeReal;
    /**
     * @ORM\Genres
     * @ORM\Column(type="ManyToMany")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Genres;     
    /**
     * @ORM\Realisateurs
     * @ORM\Column(type="ManyToMany")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Realisateurs;     
    /**
     * @ORM\Producteurs
     * @ORM\Column(type="ManyToMany")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Producteurs;     
    /**
     * @ORM\Acteurs
     * @ORM\Column(type="ManyToMany")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Acteurs;     
    /**
     * @ORM\Pays
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Pays;     
    /**
     * @ORM\Scenaristes
     * @ORM\Column(type="array")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Scenaristes;    
    /**
     * @ORM\Synopsys
     * @ORM\Column(type="text")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Synopsys;    
    /**
     * @ORM\Budget
     * @ORM\Column(type="float")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Budget;    
    /**
     * @ORM\Recompense
     * @ORM\Column(type="array")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Recompense;    
    /**
     * @ORM\DureeFilm
     * @ORM\Column(type="time")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $DureeFilm;    
    /**
     * @ORM\Actif
     * @ORM\Column(type="boolean")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Actif;    
    
    public function getId() {
        return $this->id;
    }
    
    public function __construct($name, $roles = array()) {
        parent::__construct($name, $roles);
    }
}

?>