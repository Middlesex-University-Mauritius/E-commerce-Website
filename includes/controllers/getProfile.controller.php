<?php

require_once '../services/customer.service.php';

$customerId = $_GET["customer_id"] ?? null;

if (!$customerId) {
  header("Location: /web/signin");
  exit();
}

$customerService = new Customer();
$customer = $customerService->getProfile($customerId);

$payload = array();

if (isset($_COOKIE["userId"])) {
  if ($customer && $_COOKIE["userId"] === $customerId) {
    $payload = array(
      "success" => true,
      "user" => $customer
    );
  } else {
    $payload = array(
      "success" => true,
      "user" => null
    );
  }
} else {
  $payload = array(
    "success" => false,
    "user" => null
  );
}

echo json_encode($payload);