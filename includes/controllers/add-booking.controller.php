<?php

require_once '../services/booking.service.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$eventId = $data["eventId"] ?? null;
$seats = $data["seats"] ?? null;
$subtotal = $data["subtotal"] ?? null;
$address = $data["address"] ?? null;

$userId = $_COOKIE['userId'];

if (!$userId) {
  return null;
}

$dataArray = [
  "customer_id" => new MongoDB\BSON\ObjectID($userId),
  "event_id" => new MongoDB\BSON\ObjectID($eventId),
  "seats" => $seats,
  "subtotal" => $subtotal,
  "address" => $address
];

$payload = array();

$bookingService = new Booking();

$response = $bookingService->addBooking($dataArray);

if ($response["success"]) {
  $payload = array(
    "success" => true,
    "booking_id" => $response["booking_id"]
  );
} else {
  $payload = array(
    "success" => false,
    "booking_id" => null
  );
}

echo json_encode($payload);

?>