<?php

require '../../vendor/autoload.php';

$mongoClient = (new MongoDB\Client());

$db = $mongoClient->ecommerce;

$collection = $db->bookings;

$bookings = $collection->aggregate([
  [
    '$lookup' => [
      'from' => 'customers',
      'localField' => 'customer_id',
      'foreignField' => '_id',
      'as' => 'customer'
    ]
  ],
  [
    '$unwind' => '$customer'
  ],
  [
    '$lookup' => [
      'from' => 'events',
      'localField' => 'event_id',
      'foreignField' => '_id',
      'as' => 'event'
    ]
  ],
  [
    '$unwind' => '$event'
  ]
]);

$json_str = '[';

foreach($bookings as $document) {
  $json_str .= json_encode($document);
  $json_str .= ",";
}

$json_str = substr($json_str, 0, strlen($json_str) - 1);

$json_str .= "]";

echo $json_str;