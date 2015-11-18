<?php

namespace Cine\CinemaBundle\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class CourtMetrageManager {
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * 
     * Retourne les court métrage
     * 
     * @return array
     */
    public function getAllCourtMetrages() {
        return $this->em->getRepository('CineCinemaBundle:CourtMetrage')
            ->findAll();
    }
}