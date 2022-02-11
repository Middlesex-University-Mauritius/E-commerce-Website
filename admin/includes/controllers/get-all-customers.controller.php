<?php

require '../services/customer.service.php';

$customerService = new Customer();

$events = $customerService->getCustomers();

echo json_encode($events);