<?php

namespace Application;

/**
 * Allows JSON conversion for an array of Tweets
 *
 * @author cristianmartin
 */
class TweetsJsonSerializer implements \JsonSerializable {
  
  private $tweets;
  
  public function __construct($tweets) {
    $this->tweets = array_map(function($tweet) {
      return new SerializableTweet($tweet);
    }, $tweets);
  }
  
  public function jsonSerialize() {
    return get_object_vars($this);
  }

}
