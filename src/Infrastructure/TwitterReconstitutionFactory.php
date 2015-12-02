<?php

namespace Infrastructure;

use Domain\Tweet;

/**
 * Deserialize the response from GuzzleTwiterRepository to a Twitter domain models.
 *
 * @author cristianmartin
 */
class TwitterReconstitutionFactory {
  
  public static function convert($ob) {
    
    $tweets = [];
    
    forEach($ob as $o) {
      $tweet = new Tweet($o->id, $o->text, $o->created_at, $o->retweeted);
      array_push($tweets, $tweet);
    }
    
    return $tweets;
  }
}
