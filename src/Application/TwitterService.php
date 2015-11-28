<?php

namespace Application;

/**
 * TwitterService is an ApplicationService wich connects with Infraestructure layer 
 *
 * @author cristianmartin
 */
class TwitterService {

  private $repository;

  public function __construct($repository) {
    $this->repository = $repository;
  }
  
  public function getTweets($username, $limit = "") {
    $json = $this->repository->findByUsername($username, $limit);
    
    $response = \json_decode($json->getBody());
    
    if (isset($response["errors"])) {
      $errors = $response["errors"];
      
      if ($errors[0]["code"] == 34) {
        throw new UserNotFoundException($errors[0]["message"]);
      }      
    }
    
    return $response;
  }
}
