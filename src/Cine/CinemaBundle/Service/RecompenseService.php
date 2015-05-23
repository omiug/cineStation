<?php

namespace Cine\CinemaBundle\Service;

class RecompenseService {
    private $em;

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
    
    public function __construct($em) {
        $this->em = $em;
    }

    public function getAllTypesRecompnseByGroups() {
        return $this->types;
    }
    
    public function getAllCastRecompnse() {
        return $this->em->getRepository('CineCinemaBundle:Recompense')
            ->findAllByTypes(array(1, 2, 3));
    }

    public function getAllRecompenseFilm() {
        return $this->em->getRepository('CineCinemaBundle:Recompense')
            ->findAllByTypes(array(4));
    }
}