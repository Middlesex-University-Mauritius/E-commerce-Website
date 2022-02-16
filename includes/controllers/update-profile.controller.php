<?php

require_once '../services/customer.service.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$dataArray = [
  "email" => $data["email"] ?? null,
  "firstName" => $data["firstName"] ?? null,
  "lastName" => $data["lastName"] ?? null,
  "age" => intval($data["age"]) ?? null,
  "phone" => ($data["phone"]) ?? null
];

// Calling our authentication service
$customerService = new Customer();

// Register the customer
$newProfileDetails = $customerService->updateProfileDetails($data);

// Inital payload is empty
$payload = array();

// Register successful
if ($newProfileDetails["success"]) {
  $payload = array(
    'success' => true,
    'message' => 'Profile details updated successfully',
  );
} else {
  // Registration failed
  $payload = array(
    'success' => false,
    'message' => 'Something went wrong when updating your profile',
  );
}

echo json_encode($payload);
