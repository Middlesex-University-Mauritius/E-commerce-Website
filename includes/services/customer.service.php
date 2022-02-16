<?php

require "../helpers/database.helper.php";

class Customer extends DatabaseHelper {

  function getProfile($customerId) {
    $customer = $this->database->customers->findOne([
      "_id" => new MongoDB\BSON\ObjectID($customerId)
    ]);
    return $customer;
  }

  // Update customer email, firstname, lastname, age and phone
  function updateProfileDetails($newDetails) {
    $payload = [];
    session_start();

    $modifyOneResult = $this->database->customers->updateOne(
      [
        '_id' => new \MongoDB\BSON\ObjectId($_SESSION["customer_id"])
      ],
      [
        '$set' => $newDetails
      ]
    );
    // Return payload
    $payload = [
      "success" => $modifyOneResult->getModifiedCount() == 1,
    ];

    return $payload;
  }

  // Update password
  function updatePassword($newPassword) {
  }

}

?>
