<?php

require_once '../services/customer.service.php';

$userId = $_COOKIE['userId'];

if (!$userId) {
  header("Location: /web/signin");
  exit();
}

$customerService = new Customer();
$customer = $customerService->getProfile($userId);

$payload = array();

if (isset($_COOKIE["userId"])) {
  if ($customer && $_COOKIE["userId"] === $userId) {
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