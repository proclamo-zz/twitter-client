<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use GuzzleHttp\Client;


require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext {

  private $client;
  private $response;

  /**
   * Initializes context.
   *
   * Every scenario gets its own context instance.
   * You can also pass arbitrary arguments to the
   * context constructor through behat.yml.
   */
  public function __construct() {
    $this->client = new Client();
  }

  /**
   * @Given I request :url
   */
  public function iRequest($url) {
    $this->response = $this->client->get("http://127.0.0.1:8000" . $url, ["exceptions" => false]);
    assertNotEmpty($this->response->getBody(), "Service active");
  }

  /**
   * @Then the response should be JSON
   */
  public function theResponseShouldBeJson() {
    $data = \json_decode($this->response->getBody());
    assertEquals(json_last_error(), JSON_ERROR_NONE, "Valid JSON");
  }

  /**
   * @Then the response status code should be :status
   */
  public function theResponseStatusCodeShouldBe($status) {
    assertEquals($status, $this->response->getStatusCode(), "Correct status");
  }

  /**
   * @Then I get :number tweets
   */
  public function iGetTweets($number) {
    $tweets = \json_decode($this->response->getBody());
    assertEquals(\count($tweets->tweets), $number, "Correct number of tweets");
  }

}
