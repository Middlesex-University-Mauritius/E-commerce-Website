<?php

require_once '../services/authentication.service.php';
require_once '../helpers/session.helper.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$email = $data["email"] ?? null;
$password = $data["password"] ?? null;

$customerService = new Authentication();
$session = new SessionHelper();

$customer = $customerService->getCustomerByEmail($email);

$authenticated = 0;
$payload = array();

if ($customer) {
  $authenticated = $customer->password === $password;

  if ($authenticated) {
    setcookie('customer_id', json_encode((string)$customer->_id), time()+99999999999, '/');
    $session->setUser((string)$customer->_id);
    $payload = array(
      "authenticated" => true,
      "user" => (string)$customer->_id,
      "email" => $customer->email,
      "message" => "user logged in successfully"
    );
  } else {
    $payload = array(
      "authenticated" => false,
      "user" => null,
      "email" => null,
      "message" => "Entry password invalid. Try again!"
    );
  }
}

echo json_encode($payload);