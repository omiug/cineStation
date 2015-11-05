<?php

namespace Cine\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GroupeRepository extends EntityRepository {
    /**
     * @return QueryBuilder
     */
     public function getDefaultGroups() {
         return $this->createQueryBuilder('g')
             ->select('g')
             ->where('g.id IN (:groupe)')
                ->setParameter(':group', \Cine\UserBundle\Entity\Groupe::DEFAULT_GROUPE);
     }
}