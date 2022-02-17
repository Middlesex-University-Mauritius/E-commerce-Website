<?php

require "../helpers/database.helper.php";

class Authentication extends DatabaseHelper {

  // Return a customer using their email address
  function getCustomerByEmail($email) {
    $customer = $this->database->customers->findOne([
      "email" => $email
    ]);
    return $customer;
  }

  // Register an account
  function register($values) {
    $insertResult = $this->database->customers->insertOne($values);
    return $insertResult;
  }

}

?>