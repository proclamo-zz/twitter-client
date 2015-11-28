<?php

namespace Domain;

/**
 * Tweet Entity
 *
 * @author cristianmartin
 */
class Tweet {
  private $id;
  private $text;
  private $created_at;
  private $retweeted;
  
  public function __construct($idTweet, $textTweet, $createdAt, $isRetweeted) {
    $this->id = $idTweet;
    $this->text = $textTweet;
    $this->created_at = $createdAt;
    $this->retweeted = $isRetweeted;
  }
  
  function id() {
    return $this->id;
  }

  function text() {
    return $this->text;
  }

  function createdAt() {
    return $this->created_at;
  }

  function isRetweeted() {
    return $this->retweeted;
  }

}
