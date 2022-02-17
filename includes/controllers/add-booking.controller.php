<?php

require_once '../services/booking.service.php';
require_once '../helpers/session.helper.php';

$session = new SessionHelper();
$bookingService = new Booking();

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

// Payload
$eventId = $data["eventId"] ?? null;
$seats = $data["seats"] ?? null;
$total = $data["total"] ?? null;
$address = $data["address"] ?? null;

$payload = array();

// If user is not signed in
if (!$session->isSignedIn()) {
  http_response_code(401);
  $payload = [
    "success" => false,
    "booking_id" => null,
  ];
  echo json_encode($payload);
  exit();
}

// Date posted
$datePosted = new \MongoDB\BSON\UTCDateTime();

$dataArray = [
  "customer_id" => new MongoDB\BSON\ObjectID($_SESSION["customer_id"]),
  "event_id" => new MongoDB\BSON\ObjectID($eventId),
  "seats" => $seats,
  "total" => $total,
  "address" => $address,
  "timestamp" => $datePosted
];

// Create the booking
$response = $bookingService->addBooking($dataArray);

// Send the response
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

// Encode the payload
echo json_encode($payload);

?>