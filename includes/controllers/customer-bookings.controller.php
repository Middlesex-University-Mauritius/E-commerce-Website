<?php

require_once '../services/booking.service.php';
require_once '../helpers/session.helper.php';

$session = new SessionHelper();

if (!$session->isSignedIn()) {
  echo json_encode(null);
  header("Location: /web/signin");
  exit();
}

$bookingService = new Booking();

$bookings = $bookingService->getManyBookings($_SESSION["customer_id"]);

if ($bookings) {
  echo json_encode($bookings);
} else {
  echo json_encode(null);
}

?>