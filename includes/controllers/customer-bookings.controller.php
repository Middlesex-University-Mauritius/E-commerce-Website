<?php

require_once '../services/booking.service.php';
require_once '../helpers/session.helper.php';

$session = new SessionHelper();

// The customer id
$customer_id = $_GET["customer_id"] ?? $_SESSION["customer_id"];

$bookingService = new Booking();

// Get the bookings using the customer id
$bookings = $bookingService->getManyBookings($customer_id);

echo json_encode($bookings);
?>