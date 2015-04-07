<?php

namespace Cine\CinemaBundle\Controller;

use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
//        $message = Swift_Message::newInstance()
//                ->setSubject('mon super titre')
//                ->setFrom('test@moi.fr')
//                ->setTo('jonathan.boivin22@gmail.com')
//                ->setContentType('text/html')
//                ->setBody($this->renderView('CineCinemaBundle:Default:index.html.twig', array()));
//        $this->get('mailer')->send($message);
        return $this->render('CineCinemaBundle:Default:index.html.twig', array());
    }
}
