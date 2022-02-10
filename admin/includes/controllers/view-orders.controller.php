<?php

require '../../../includes/services/booking.service.php';

$bookingService = new Booking();

$orders = $bookingService->getBookings();

echo json_encode($orders);