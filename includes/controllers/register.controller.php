<?php

require_once '../services/authentication.service.php';
require_once '../helpers/session.helper.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$email = $data["email"] ?? null;
$firstName = $data["firstName"] ?? null;
$lastName = $data["lastName"] ?? null;
$age = $data["age"] ?? null;
$phone = $data["phone"] ?? null;
$password = $data["password"] ?? null;
$confirmPassword = $data["confirmPassword"] ?? null;

// Form inputs from front end
$dataArray = [
  "email" => $email,
  "firstName" => $firstName,
  "lastName" => $lastName,
  "age" => intval($age),
  "phone" => intval($phone),
  "password" => $password,
  "bookingQuantity" => 0
];

// Calling our authentication service
$customerService = new Authentication();
// Session service
$session = new SessionHelper();

// TODO: Write a validation here to check if customer already exists. Use the function getCustomerByEmail in service.
// Don't forget to exit() after the validation. 

// Register the customer
$registerPayload = $customerService->register($dataArray);

// Inital payload is empty
$payload = array();

// Register successful
if ($registerPayload["success"]) {
  setcookie('customer_id', json_encode($registerPayload["customer_id"]), time()+99999999999, '/');
  $session->setUser($registerPayload["customer_id"]);

  $payload = array(
    'success' => true,
    'message' => 'customer added',
    'user' => $registerPayload["customer_id"]
  );
} else {
  // Registration failed
  $payload = array(
    'success' => false,
    'message' => 'customer not added',
    'user' => null
  );
}

echo json_encode($payload);
