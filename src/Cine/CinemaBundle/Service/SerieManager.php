<?php

namespace Cine\CinemaBundle\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class SerieManager {
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * 
     * Retourne les séries
     * 
     * @return array
     */
    public function getAllSeries() {
        return $this->em->getRepository('CineCinemaBundle:Serie')
            ->findAll();
    }
}