<?php

require_once '../services/booking.service.php';
require_once '../helpers/session.helper.php';

$session = new SessionHelper();

$customer_id = $_GET["customer_id"] ?? $_SESSION["customer_id"];

$bookingService = new Booking();

$bookings = $bookingService->getManyBookings($customer_id);

echo json_encode($bookings);
?>