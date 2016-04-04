<?php

namespace Blogger\BloggerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {

  /**
   * @Route(
   *     "/{_locale}",
   *     defaults={"_locale": "fr"},
   *     requirements={
   *         "_locale": "en|fr"
   *     }
   * )
   */
  public function indexAction($_locale) {
    return $this->render('BloggerBloggerBundle:Default:index.html.twig', array(
        'a_variable' => 'aze', 'navigation' => array(
          array('href' => '#', 'caption' => 'Accueil'),
           array('href' => '#', 'caption' => 'Prog')
        )
    ));
  }
}
