<?php

require_once '../services/customer.service.php';
require_once '../helpers/session.helper.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$dataArray = [
  "email" => $data["email"] ?? null,
  "firstName" => $data["firstName"] ?? null,
  "lastName" => $data["lastName"] ?? null,
  "age" => intval($data["age"]) ?? null,
  "phone" => ($data["phone"]) ?? null
];

// Calling our customer service
$customerService = new Customer();

// Session helper
$session = new SessionHelper();

// Update the profile details
$newProfileDetails = $customerService->updateProfileDetails($session->getUser(), $data);
$success = $newProfileDetails->getModifiedCount() == 1;

// Inital payload is empty
$payload = array();

// Details change successful
if ($success) {
  $payload = array(
    'success' => true,
    'message' => 'Profile details updated successfully',
  );
} else {
  // Failed
  $payload = array(
    'success' => false,
    'message' => 'Something went wrong when updating your profile',
  );
}

echo json_encode($payload);
