<?php

require '../../vendor/autoload.php';

$category = $_GET["category"] ?? null;

$mongoClient = (new MongoDB\Client());

$db = $mongoClient->ecommerce;

$collection = $db->events;

$events = $collection->find([
  'category' => $category
]);

$json_str = '[';

foreach ($events as $event) {
  $json_str .= json_encode($event);
  $json_str .= ",";
};

$json_str = substr($json_str, 0, strlen($json_str) - 1);

$json_str .= "]";

echo $json_str;