<?php

namespace Application;

use Domain\Tweet;
use JsonSerializable;

/**
 * A JsonSerializer implementation for a Tweet
 *
 * @author cristianmartin
 */
class SerializableTweet implements JsonSerializable {
  
  private $id;
  private $text;
  private $createdAt;
  private $isRetweeted;
  
  public function __construct(Tweet $tweet) {
    $this->id = $tweet->id();
    $this->text = $tweet->text();
    $this->createdAt = $tweet->createdAt();
    $this->isRetweeted = $tweet->isRetweeted();
  }
  
  public function jsonSerialize() {
    return get_object_vars($this);
  }
}
