<?php

require_once '../services/authentication.service.php';
require_once '../helpers/session.helper.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$email = $data["email"] ?? null;
$password = $data["password"] ?? null;

$customerService = new Authentication();
$session = new SessionHelper();

// Check if customer exists
$customer = $customerService->getCustomerByEmail($email);

$authenticated = 0;
$payload = array();

if ($customer) {
  $authenticated = $customer->password === $password;

  // Authenticated
  if ($authenticated) {
    setcookie('customer_id', json_encode((string)$customer->_id), time()+99999999999, '/');
    $session->setUser((string)$customer->_id);
    $payload = array(
      "success" => true,
      "message" => "User logged in successfully"
    );
  } else {
    // Invalid password 
    $payload = array(
      "success" => false,
      "message" => "Entry password invalid. Try again!"
    );
  }
} else {
  // Customer does not exist
  $payload = array(
    "success" => false,
    "message" => "This user does not exist"
  );
}

echo json_encode($payload);