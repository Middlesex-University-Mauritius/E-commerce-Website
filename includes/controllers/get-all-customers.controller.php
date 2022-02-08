<?php

require_once '../services/customer.service.php';

$customerId = $_GET["customer_id"] ?? null;

$customerService = new Customer();
$customers = $customerService->getAllCustomers();

echo json_encode($customers);