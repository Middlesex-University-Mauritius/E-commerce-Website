<?php

require '../../vendor/autoload.php';

$mongoClient = (new MongoDB\Client());

$db = $mongoClient->ecommerce;

$collection = $db->customers;

$customers = $collection->find([]);

$json_str = '[';

foreach($customers as $document) {
  $json_str .= json_encode($document);
  $json_str .= ",";
}

$json_str = substr($json_str, 0, strlen($json_str) - 1);

$json_str .= "]";

echo $json_str;