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
    return $insertResult;
  }

}

?>