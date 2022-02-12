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
  }

  // Update password
  function updatePassword($newPassword) {
  }

}

?>