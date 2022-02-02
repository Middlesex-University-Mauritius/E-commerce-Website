<?php

session_start();

require_once '../services/customer.service.php';

$customerId = $_GET["customer_id"] ?? null;

if (!$customerId) {
  header("Location: /web/signin");
  exit();
}

$customerService = new Customer();
$customer = $customerService->getProfile($customerId);

$payload = array();

if (isset($_SESSION["user"]) && json_decode($_SESSION["user"])->authenticated) {
  if ($customer && json_decode($_SESSION["user"])->id === $customerId) {
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