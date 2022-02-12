<?php

require "../helpers/database.helper.php";

class Authentication extends DatabaseHelper {

  function getCustomerByEmail($email) {
    $customer = $this->database->customers->findOne([
      "email" => $email
    ]);
    return $customer;
  }

  function register($values) {
    $insertResult = $this->database->customers->insertOne($values);
    $success = $insertResult->getInsertedCount() == 1;

    if ($success) {
      return [
        "success" => $success,
        "customer_id" => (string)$insertResult->getInsertedId(),
      ];
    } else {
      return [
        "success" => false,
        "customer_id" => null
      ];
    }
  }

  function changePassword($newPassword) {
    // Write mongo query
  }

}

?>