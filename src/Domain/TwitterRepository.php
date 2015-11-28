<?php

namespace Domain;

/**
 *
 * @author cristianmartin
 */
interface TwitterRepository {
  public function findByUsername($username, $limit);
}
