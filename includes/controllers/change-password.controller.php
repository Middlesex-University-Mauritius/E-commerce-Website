<?php

require_once '../services/customer.service.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$newPassword = $data["newPassword"] ?? null;

// Calling our authentication service
$customerService = new Customer();

// Register the customer
$newPasswordPayload = $customerService->updatePassword($newPassword);

// Inital payload is empty
$payload = array();

// Register successful
if ($newPasswordPayload["success"]) {
  $payload = array(
    'success' => true,
    'message' => 'Password changed successfully',
  );
} else {
  // Registration failed
  $payload = array(
    'success' => false,
    'message' => 'Unable to change your password',
  );
}

echo json_encode($payload);
