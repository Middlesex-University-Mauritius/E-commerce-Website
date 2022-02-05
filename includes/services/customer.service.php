<?php

require "../helpers/database.helper.php";

class Customer extends DatabaseHelper {

  function getAllCustomers() {
    $customers = $this->database->customers->find([]);
    return $customers->toArray();
  }

  function getProfile($customerId) {
    $customer = $this->database->customers->findOne([
      "_id" => new MongoDB\BSON\ObjectID($customerId)
    ]);
    return $customer;
  }

}

?>