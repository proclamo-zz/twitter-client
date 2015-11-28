<?php

namespace Infraestructure;

use Domain\TwitterRepository;
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

  public function findByUsername($username, $limit = DEFAULT_TWEETS) {
    return $this->client->get('statuses/user_timeline.json?screen_name=' . $username . '&count=' . $limit, ["http_errors" => true]);
  }

}
