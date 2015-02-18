<?php

namespace Cine\UserBundle\Service;

use FOS\UserBundle\Event\FilterUserResponseEvent;

class RegisterListener {

     public function registerCompleted(FilterUserResponseEvent $event) {
         \Doctrine\Common\Util\Debug::dump($event, 3, 0);die('ok');
     }

}