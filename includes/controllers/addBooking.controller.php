<?php

session_start();

require_once '../services/booking.service.php';

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

$bookingService = new Booking();

$success = $bookingService->addBooking($dataArray);

if ($success) {
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

?>