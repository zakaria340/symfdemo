<?php

namespace ZA\MoviesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {

  /**
   * @Route("/")
   */
  public function indexAction() {
    $client = $this->get('tmdb.client');
    $TopRatedMovies = $client->getMoviesApi()->getPopular(array('page' => 1));
    $TopRatedMovies = $TopRatedMovies['results'];
    $firstMovies = array_slice($TopRatedMovies, 0, 3);

    $TopRatedTV = $client->getTvApi()->getPopular(array('page' => 1));
    $TopRatedTV = $TopRatedTV['results'];
    $firstTvs = array_slice($TopRatedTV, 0, 3);
    //var_dump($firstTvs);die;
    //  var_dump($firstMovies);die;
    return $this->render('ZAMoviesBundle:Default:index.html.twig', array(
        'firstMovies' => $firstMovies,
        'firstTvs' => $firstTvs
    ));
  }
}
