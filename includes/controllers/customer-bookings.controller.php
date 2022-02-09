<?php

require_once '../services/booking.service.php';

$userId = $_COOKIE['userId'];

if (!$userId) {
  return null;
}

$bookingService = new Booking();

$bookings = $bookingService->getManyBookings($userId);

if ($bookings) {
  echo json_encode($bookings);
} else {
  echo null;
}

?>