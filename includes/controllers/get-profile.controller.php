<?php

require_once '../services/customer.service.php';
require_once '../helpers/session.helper.php';

$customerService = new Customer();
$session = new SessionHelper();

// Is signed in 
if (!$session->isSignedIn()) {
  echo json_encode(null);
  header("Location: /web/signin");
  exit();
}

// Get the profile
$customer = $customerService->getProfile($_SESSION["customer_id"]);

$payload = array();

if ($customer) {
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

echo json_encode($payload);