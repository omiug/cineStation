<?php

namespace Cine\UserBundle\Service;

use Cine\UserBundle\Entity\User;

class GroupeManager {
     protected $em;

     public function __construct(\Doctrine\ORM\EntityManager $em)
     {
         $this->em = $em;
     }

     /**
      * Ajoute le groupe par defaut à un user
      * 
      * @param User $user
      */
     public function addDefaultGroups(User $user) {
         if ( !count($user->getGroups()) ) {
             $qb = $this->em->getRepository('CineUserBundle:Groupe')
                 ->getDefaultGroups();
             $groups = $qb->getQuery()->getResult();
             
             $user->setGroups($groups);
             $this->em->persist($user);
         }
     }
}