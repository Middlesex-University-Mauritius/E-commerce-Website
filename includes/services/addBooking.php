<?php

require '../../vendor/autoload.php';

session_start();

$mongoClient = (new MongoDB\Client());

$db = $mongoClient->ecommerce;

$collection = $db->bookings;

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$eventId = $data["eventId"] ?? null;
$seats = $data["seats"] ?? null;
$subtotal = $data["subtotal"] ?? null;
$address = $data["address"] ?? null;
$user = json_decode($_SESSION["user"]);

$dataArray = [
  "customer_id" => new MongoDB\BSON\ObjectID($user->id),
  "event_id" => new MongoDB\BSON\ObjectID($eventId),
  "seats" => $seats,
  "subtotal" => $subtotal,
  "address" => $address
];

$payload = array();

$insertResult = $collection->insertOne($dataArray);

if ($insertResult->getInsertedCount() == 1) {
  $payload = array(
    "success" => true,
    "booking_id" => (string)$insertResult->getInsertedId()
  );
} else {
  $payload = array(
    "success" => false,
    "booking_id" => null
  );
}

echo json_encode($payload);