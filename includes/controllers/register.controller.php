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
  "phone" => $phone,
  "password" => $password,
  "bookingQuantity" => 0
];

// Calling our authentication service
$customerService = new Authentication();
// Session service
$session = new SessionHelper();

// Inital payload is empty
$payload = array();

$customer = $customerService->getCustomerByEmail($email);

if ($customer) {
  $payload = [
    "success" => false,
    "message" => "User with that email address already exists"
  ];
  echo json_encode($payload);
  exit();
}

// Register the customer
$registration = $customerService->register($dataArray);

$success = $registration->getInsertedCount() == 1;
$customer_id = (string)$registration->getInsertedId();

// Register successful
if ($success) {
  setcookie('customer_id', json_encode($customer_id), time()+99999999999, '/');
  $session->setUser($customer_id);

  $payload = array(
    'success' => true,
    'message' => 'customer added',
  );
} else {
  // Registration failed
  $payload = array(
    'success' => false,
    'message' => 'customer not added',
  );
}

echo json_encode($payload);
