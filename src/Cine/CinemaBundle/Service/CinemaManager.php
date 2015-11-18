<?php

namespace Cine\CinemaBundle\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class CinemaManager {
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * 
     * Retourne un cinema en fonction d'un id
     * 
     * @return array
     */
    public function getCinemaById($id) {
        return $this->em->getRepository('CineCinemaBundle:Cinema')
            ->findOneBy(array(
                'id' => $id 
            ));
    }
}