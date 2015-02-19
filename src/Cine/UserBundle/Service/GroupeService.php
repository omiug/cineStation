<?php

namespace Cine\UserBundle\Service;

use Cine\UserBundle\Entity\User;

class GroupeService {
     protected $em;

     public function __construct($em)
     {
         $this->em = $em;
     }

     public function addDefaultGroups(User $user) {
         if ( !count($user->getGroups()) ) {
             $groups = $this->em->getRepository('CineUserBundle:Groupe')->getDefaultGroups();
             $user->setGroups($groups);
             $this->em->persist($user);
         }
     }
}