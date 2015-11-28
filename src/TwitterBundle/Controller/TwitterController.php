<?php

namespace TwitterBundle\Controller;

use Application\UserNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/tweets")
 */
class TwitterController extends Controller
{
    /**
     * @Route("/{username}", name="tweets", defaults = {"username" = ""})
     * @Method("GET")
     */
    public function indexAction($username = "")
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        
        if (empty($username)) {
          $content = ["message" => "Username required"];
          $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
        else {
          $twitter = $this->get('twitter_service');
          
          try {
            $content = $twitter->getTweets($username);
          }
          catch (UserNotFoundException $ex) {
            $content = ["message" => $ex->getMessage()];
            $response->setStatusCode(UserNotFoundException::STATUS_CODE);
          }
          catch (\Exception $ex) {
            $content = ["message" => $ex->getMessage()];
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
          }
        }
        
        $response->setContent(\json_encode($content));
        
        return $response;
    }
}
