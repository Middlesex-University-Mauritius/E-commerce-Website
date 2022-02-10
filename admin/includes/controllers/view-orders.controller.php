<?php

require '../../../includes/services/booking.service.php';

// Initiate the booking service
$bookingService = new Booking();

// Get all the bookings
$bookings = $bookingService->getBookings();

// Encode data 
echo json_encode($bookings);