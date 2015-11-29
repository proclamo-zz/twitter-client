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
  
  public function getTweets($username, $limit) {  
    $tweets = $this->repository->findByUsername($username, $limit);
    return new TweetsJsonSerializer($tweets);
  }
}
