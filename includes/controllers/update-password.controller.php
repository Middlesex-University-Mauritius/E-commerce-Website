<?php

require_once '../services/customer.service.php';
require_once '../helpers/session.helper.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$newPassword = $data["newPassword"] ?? null;

// Calling our customer service
$customerService = new Customer();

// Session helper
$session = new SessionHelper();

// Change the password
$udpatePassword = $customerService->updatePassword($session->getUser(), $newPassword);
$success = $udpatePassword->getModifiedCount() == 1;

// Inital payload is empty
$payload = array();

// Change password successful
if ($success) {
  $payload = array(
    'success' => true,
    'message' => 'Password changed successfully',
  );
} else {
  // Change password failed
  $payload = array(
    'success' => false,
    'message' => 'Something went wrong when changing your password',
  );
}

echo json_encode($payload);
