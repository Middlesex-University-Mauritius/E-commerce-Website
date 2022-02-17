<?php

require '../services/customer.service.php';

$withBookingQuantity = (isset($_GET["withBookingQuantity"]) and $_GET["withBookingQuantity"] == "true") ?? false;

$customerService = new Customer();

// Get all the customers with filter
$events = $customerService->getCustomers($withBookingQuantity);

echo json_encode($events);