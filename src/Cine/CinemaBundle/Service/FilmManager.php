<?php

namespace Cine\CinemaBundle\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class FilmManager {
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * 
     * Retourne les films
     * 
     * @return array
     */
    public function getAllFilms() {
        return $this->em->getRepository('CineCinemaBundle:Film')
            ->findAll();
    }
}