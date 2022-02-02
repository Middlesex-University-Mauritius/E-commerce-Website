<?php

session_start();

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
  $_SESSION["user"] = json_encode(array(
    "authenticated" => true,
    "id" => (string)$insertResult->getInsertedId()
  ));
  $payload = array(
    'success' => true,
    'message' => 'customer added',
    'user' => (string)$insertResult->getInsertedId()
  );
} else {
  $_SESSION["user"] = null;
  $payload = array(
    'success' => false,
    'message' => 'customer not added',
    'user' => null
  );
}

echo json_encode($payload);
