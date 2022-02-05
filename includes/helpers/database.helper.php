<?php

require "../../vendor/autoload.php";

class DatabaseHelper {
  public $database;

  function __construct() {
    $connection = (new MongoDB\Client());
    $this->database = $connection->ecommerce;
  }

}