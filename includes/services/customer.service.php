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
  function updateProfileDetails($customer_id, $newDetails) {
    $modifyOneResult = $this->database->customers->updateOne(
      [
        '_id' => new \MongoDB\BSON\ObjectId($customer_id)
      ],
      [
        '$set' => $newDetails
      ]
    );

    return $modifyOneResult;
  }

  // Update password
  function updatePassword($customer_id, $newPassword) {
    $modifyOneResult = $this->database->customers->updateOne(
      [
        '_id' => new \MongoDB\BSON\ObjectId($_SESSION["customer_id"])
      ],
      [
        '$set' => [
          "password" => $newPassword
        ]
      ]
    );

    return $modifyOneResult;
  }

}

?>
