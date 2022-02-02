<?php

require_once '../services/authentication.service.php';

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
$success = $customerService->register($dataArray);

$payload = array();

if ($success) {
  setcookie('userId', (string)$insertResult->getInsertedId(), time()+99999999999, '/');
  $payload = array(
    'success' => true,
    'message' => 'customer added',
    'user' => (string)$insertResult->getInsertedId()
  );
} else {
  setcookie('userId', null, time()+99999999999, '/');
  $payload = array(
    'success' => false,
    'message' => 'customer not added',
    'user' => null
  );
}

echo json_encode($payload);
