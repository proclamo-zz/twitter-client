<?php

namespace Infraestructure;

use Domain\Exception\UserNotFoundException;
use Domain\TwitterRepository;
use Exception;
use GuzzleHttp\Client;

/**
 * Description of GuzzleTwitterRepository
 *
 * @author cristianmartin
 */
class GuzzleTwitterRepository implements TwitterRepository {
  
  // implementation details, they could be in a domain class
  const DEFAULT_TWEETS = 10;
  const MAX_TWEETS = 20;
  
  private $client;
  
  public function __construct(Client $client) {
    $this->client = $client;
  }

  public function findByUsername($username, $limit) {
    if ($limit == "") {
      $limit = self::DEFAULT_TWEETS;
    }
    
    if ($limit > self::MAX_TWEETS) {
      $limit = self::MAX_TWEETS;
    }
    
    try {
      $json = $this->client->get('statuses/user_timeline.json?screen_name=' . $username . '&count=' . $limit)->getBody();       
    }
    catch(Exception $ex) {
      if ($ex->getCode() === 404) {
        throw new UserNotFoundException($ex);
      }
      else {
        throw new Exception($ex);
      }
    }
    
    $response = \json_decode($json);    
    return TwitterReconstitutionFactory::convert($response);
  }

}
