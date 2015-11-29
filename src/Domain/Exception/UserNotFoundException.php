<?php

namespace Domain\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;


/**
 * UserNotFoundException
 *
 * @author cristianmartin
 */
class UserNotFoundException extends Exception {
  
  const STATUS_CODE = Response::HTTP_NOT_FOUND;
  
  public function __construct($message, $code, $previous) {
    parent::__construct($message, $code, $previous);
  }
}
