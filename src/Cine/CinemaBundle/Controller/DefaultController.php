<?php

namespace Cine\CinemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CineCinemaBundle:Default:index.html.twig', array());
    }
}
