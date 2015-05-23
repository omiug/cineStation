<?php
namespace Cine\CinemaBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RecompenseRepository extends EntityRepository {
    public function findAllByTypes(array $type) {
        $qb = $this->createQueryBuilder('r')
            ->where('r.type IN (:type)')
                ->setParameter(':type', $type);
        
        return $qb->getQuery()->getResult();
    }
}