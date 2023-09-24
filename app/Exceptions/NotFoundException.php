<?php

namespace App\Exceptions;

use RuntimeException;

class NotFoundException extends RuntimeException {
  public static function new(String $resourceName, String $id = null) {
    return new NotFoundException("No $resourceName was found for $id.", 404);
  }
}