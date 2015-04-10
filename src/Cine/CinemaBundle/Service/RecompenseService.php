<?php

namespace Cine\CinemaBundle\Service;

class RecompenseService {
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

    public function getAllTypesRecompnseByGroups() {
        return $this->types;
    }

    public function getTypesRecompenseCast() {
        if ( isset($this->types['Humaine']) ) {
            return $this->types['Humaine'];
        }

        return array();
    }

    public function getTypesRecompenseCinema() {
        if ( isset($this->types['Autre']) ) {
            return $this->types['Autre'];
        }

        return array();
    }
}