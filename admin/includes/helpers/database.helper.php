<?php

require "../../../vendor/autoload.php";

class DatabaseHelper {
  public $database;

  function __construct() {
    $connection = (new MongoDB\Client());
    $this->database = $connection->ecommerce;
  }

  function prettifyList($list) {
    if ($list->isDead()) return null;

    $json_str = '[';

    foreach ($list as $item) {
      $json_str .= json_encode($item);
      $json_str .= ",";
    };

    $json_str = substr($json_str, 0, strlen($json_str) - 1);

    $json_str .= "]";

    return $json_str;
  }

}