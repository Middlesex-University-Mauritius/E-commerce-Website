<?php

require_once '../services/booking.service.php';
require_once '../helpers/session.helper.php';

$session = new SessionHelper();

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$eventId = $data["eventId"] ?? null;
$seats = $data["seats"] ?? null;
$subtotal = $data["subtotal"] ?? null;
$address = $data["address"] ?? null;

$payload = array();

if (!$session->isSignedIn()) {
  http_response_code(401);
  $payload = [
    "success" => false,
    "booking_id" => null,
  ];
  echo json_encode($payload);
  exit();
}

$datePosted = new \MongoDB\BSON\UTCDateTime();

$dataArray = [
  "customer_id" => new MongoDB\BSON\ObjectID($_SESSION["customer_id"]),
  "event_id" => new MongoDB\BSON\ObjectID($eventId),
  "seats" => $seats,
  "subtotal" => $subtotal,
  "address" => $address,
  "timestamp" => $datePosted
];

$bookingService = new Booking();

$response = $bookingService->addBooking($dataArray);

if ($response["success"]) {
  http_response_code(200);
  $payload = array(
    "success" => true,
    "booking_id" => $response["booking_id"]
  );
} else {
  http_response_code(500);
  $payload = array(
    "success" => false,
    "booking_id" => null
  );
}

echo json_encode($payload);

?>