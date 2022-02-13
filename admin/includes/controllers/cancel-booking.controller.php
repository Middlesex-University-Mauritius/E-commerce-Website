<?php

require '../services/booking.service.php';

$booking_id = $_GET["booking_id"] ?? null;
$customer_id = $_GET["customer_id"] ?? null;

$payload = array();

$bookingService = new Booking();

$payload = $bookingService->cancelBooking($booking_id, $customer_id);

if ($payload["success"]) {
  $payload = array(
    "success" => true,
    "message" => "Booking deleted successfully"
  ); 
} else {
  $payload = array(
    "success" => false,
    "message" => "Unable to delete booking"
  );
}

echo json_encode($payload);