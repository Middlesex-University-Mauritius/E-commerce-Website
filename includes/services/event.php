<?php

require '../../vendor/autoload.php';

$id = $_GET["id"] ?? null;

$mongoClient = (new MongoDB\Client());

$db = $mongoClient->ecommerce;

$collection = $db->events;

$event = $collection->aggregate([
  [
    '$match' => [
      '_id' => new MongoDB\BSON\ObjectID($id)]
    ],
  [
    '$lookup' => [
      'from' => 'bookings',
      'localField' => '_id',
      'foreignField' => 'event_id',
      'as' => 'bookings'
    ]
  ],
  [
    '$unwind' => '$bookings'
  ],
  [
    '$lookup' => [
      'from' => 'customers',
      'localField' => 'bookings.customer_id',
      'foreignField' => '_id',
      'as' => 'bookings.customer'
    ]
  ],
  [
    '$unwind' => '$bookings.customer'
  ]
]);

$json_str = '[';

foreach($event as $document) {
  $json_str .= json_encode($document);
  $json_str .= ",";
}

$json_str = substr($json_str, 0, strlen($json_str) - 1);

$json_str .= "]";

echo $json_str;