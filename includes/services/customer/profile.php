<?php

require '../../../vendor/autoload.php';

$customerId = $_GET["customer_id"] ?? null;

if (!$customerId) {
  header("Location: /web/signin");
  exit();
}

$mongoClient = (new MongoDB\Client());

$db = $mongoClient->ecommerce;

$collection = $db->customers;

$customer = $collection->findOne([
  "_id" => new MongoDB\BSON\ObjectID($customerId)
]);

$payload = array();

if ($customer) {
  $payload = array(
    "success" => true,
    "user" => $customer
  );
} else {
  $payload = array(
    "success" => true,
    "user" => null
  );
}

echo json_encode($payload);