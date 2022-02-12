<?php

require "../helpers/database.helper.php";

class Customer extends DatabaseHelper {

  function getProfile($customerId) {
    $customer = $this->database->customers->findOne([
      "_id" => new MongoDB\BSON\ObjectID($customerId)
    ]);
    return $customer;
  }

  function updateCustomerBookingQuantity($customer_id) {
    $this->database->customers->updateOne(
      [
        '_id' => new MongoDB\BSON\ObjectID($customer_id)
      ],
      [
        '$inc' => [
          'bookingQuantity' => 1
        ]
      ]
    );
  }

  // Update customer email, firstname, lastname, age and phone
  function updateProfileDetails($newDetails) {
  }

  // Update password
  function updatePassword($newPassword) {
  }

}

?>