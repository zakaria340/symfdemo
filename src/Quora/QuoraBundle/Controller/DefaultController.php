<?php

namespace Quora\QuoraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('QuoraQuoraBundle:Default:index.html.twig');
    }
}
