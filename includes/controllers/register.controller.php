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

$dataArray = [
  "email" => $email,
  "firstName" => $firstName,
  "lastName" => $lastName,
  "age" => intval($age),
  "phone" => intval($phone),
  "password" => $password
];

$customerService = new Authentication();
$session = new SessionHelper();

$registerPayload = $customerService->register($dataArray);

$payload = array();

if ($registerPayload["success"]) {
  setcookie('customer_id', (string)$insertResult->getInsertedId(), time()+99999999999, '/');
  $session->setUser((string)$insertResult->getInsertedId());

  $payload = array(
    'success' => true,
    'message' => 'customer added',
    'user' => $registerPayload["customer_id"]
  );
} else {
  $payload = array(
    'success' => false,
    'message' => 'customer not added',
    'user' => null
  );
}

echo json_encode($payload);
