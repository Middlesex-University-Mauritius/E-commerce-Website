<?php
require '../../vendor/autoload.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$email = $data["email"] ?? null;
$password = $data["password"] ?? null;

$mongoClient = (new MongoDB\Client());

$db = $mongoClient->ecommerce;

$collection = $db->customers;

$customer = $collection->findOne([
  "email" => $email
]);

$authenticated = 0;
$payload = array();

if ($customer) {
  $authenticated = $customer->password === $password;

  if ($authenticated) {
    session_start();
    $_SESSION["authenticated"] = true;
    $payload = array(
      "authenticated" => true,
      "user" => $customer->_id,
      "message" => "user logged in successfully"
    );
  } else {
    $payload = array(
      "authenticated" => false,
      "user" => null,
      "message" => "Entry password invalid. Try again!"
    );
  }
}

echo json_encode($payload);