<?php

require '../../../vendor/autoload.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$title = $data['title'];
$description = $data['description'];
$date = $data['date'];
$time = $data['time'];
$category = $data['category'];
$prices = $data['prices'];
$tags = $data['tags'];

$mongoClient = (new MongoDB\Client());

$db = $mongoClient->ecommerce;

$collection = $db->events;

$payload = array();

try {
  $insertOneResult = $collection->insertOne([
    "title" => $title,
    "description" => $description,
    "date" => $date,
    "time" => $time,
    "category" => $category,
    "tags" => $tags,
    "prices" => array(
      "regular" => intval($prices["regular"]),
      "premium" => intval($prices["premium"]),
      "vip" => intval($prices["vip"]),
    ),
  ]);

  if ($insertOneResult) {
    $payload = array(
      "success" => true,
      "message" => "Event created successfully",
      "event" => array(
        "event_id" => $insertOneResult->getInsertedId(),
        "title" => $title
      )
    ); 
  } else {
    $payload = array(
      "success" => false,
      "message" => "Unable to create event",
      "event" => null
    );
  }
} catch (Exception $e) {
  $payload = array(
    "success" => false,
    "message" => "Unable to create event",
    "event" => null
  );
}

echo json_encode($payload);