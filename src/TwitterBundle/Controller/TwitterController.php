<?php

namespace TwitterBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/tweets")
 */
class TwitterController extends Controller
{
    /**
     * @Route("/{url}", name="tweets", defaults = {"url" = ""})
     * @Method("GET")
     */
    public function indexAction($url = "")
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        
        $content = ["url" => $url];
        
        if (empty($url)) {
          $content = ["message" => "Username required"];
          $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
        
        $response->setContent(\json_encode($content));
        
        return $response;
    }
}
