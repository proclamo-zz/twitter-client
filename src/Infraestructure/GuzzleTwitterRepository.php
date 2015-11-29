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
  
  const DEFAULT_TWEETS = 10;
  const MAX_TWEETS = 20;
  
  private $client;
  
  public function __construct(Client $client) {
    $this->client = $client;
  }

  public function findByUsername($username, $limit = "") {
    if ($limit == "") {
      $limit = self::DEFAULT_TWEETS;
    }
    
    $json = $this->client->get('statuses/user_timeline.json?screen_name=' . $username . '&count=' . $limit, ["http_errors" => true]);    
    
    $response = \json_decode($json->getBody());    
    return TwitterReconstitutionFactory::convert($response);
  }

}
