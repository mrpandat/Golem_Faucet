<?php

namespace GOLEM\GolemFaucetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GOLEMGolemFaucetBundle:Default:index.html.twig');
    }
}
