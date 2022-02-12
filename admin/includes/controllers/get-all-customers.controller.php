<?php

require '../services/customer.service.php';

$withBookingQuantity = (isset($_GET["withBookingQuantity"]) and $_GET["withBookingQuantity"] == "true") ?? false;

$customerService = new Customer();

$events = $customerService->getCustomers($withBookingQuantity);

echo json_encode($events);