<?php

namespace Cine\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GroupeRepository extends EntityRepository {
     public function getDefaultGroups() {
         $qb = $this->createQueryBuilder('g')
             ->select('g')
             ->where('g.id IN (2)');
         return $qb->getQuery()->getResult();
     }
}