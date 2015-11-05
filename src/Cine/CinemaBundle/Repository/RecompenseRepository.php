<?php
namespace Cine\CinemaBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RecompenseRepository extends EntityRepository {
    /**
     * @param array $type
     * @return QueryBuilder
     */
    public function findAllByTypes(array $type) {
        return $this->createQueryBuilder('r')
            ->where('r.type IN (:type)')
                ->setParameter(':type', $type);
    }
}