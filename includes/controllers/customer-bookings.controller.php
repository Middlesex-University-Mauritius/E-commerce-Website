<?php

require_once '../services/booking.service.php';
require_once '../helpers/session.helper.php';

$session = new SessionHelper();

$customer_id = $_GET["customer_id"] ?? $_SESSION["customer_id"];

if (!$session->isSignedIn()) {
  echo json_encode(null);
  header("Location: /web/signin");
  exit();
}

$bookingService = new Booking();

$bookings = $bookingService->getManyBookings($customer_id);

if ($bookings) {
  echo json_encode($bookings);
} else {
  echo json_encode(null);
}

?>