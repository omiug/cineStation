<?php

namespace Cine\UserBundle\Service;

use FOS\UserBundle\Event\FilterUserResponseEvent;

class RegisterListener {
    protected $servGroup;

    public function __construct(GroupeService $servGroup) {
        $this->servGroup = $servGroup;
    }

    public function registerCompleted(FilterUserResponseEvent $event) {
        $user = $event->getUser();
        $this->servGroup->addDefaultGroups($user);
//        \Doctrine\Common\Util\Debug::dump($event->getUser(), 3, 0);die('ok');
    }

}