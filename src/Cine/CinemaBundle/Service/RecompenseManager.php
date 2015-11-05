<?php

namespace Cine\CinemaBundle\Service;

use Doctrine\ORM\EntityManager;

class RecompenseManager {
    protected $em;

    private $types = array(
        'Humaine' => array(
            '1' => 'Acteur',
            '2' => 'Réalisateur',
            '3' => 'Compositeur',
        ),
        'Autre' => array(
            '4' => 'Film',
            '5' => 'Série',
            '6' => 'Court Métrage'
        )
    );
    
    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * 
     * Retourne tous les type de recompenses
     * 
     * @return array
     */
    public function getAllTypesRecompnseByGroups() {
        return $this->types;
    }
    
    
    /**
     * 
     * Retourne les récompenses des cast
     * 
     * @return array
     */
    public function getAllCastRecompnse() {
        $qb = $this->em->getRepository('CineCinemaBundle:Recompense')
            ->findAllByTypes(array(1, 2, 3));
        
        return $qb->getQuery()->getResult();
    }

    /**
     * 
     * Retourne les récompenses des films
     * 
     * @return array
     */
    public function getAllRecompenseFilm() {
        $qb = $this->em->getRepository('CineCinemaBundle:Recompense')
            ->findAllByTypes(array(4));
        
        return $qb->getQuery()->getResult();
    }
}