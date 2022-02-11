<?php

require "../helpers/database.helper.php";
require "../../../vendor/autoload.php";

class Customer extends DatabaseHelper {

  function getCustomers() {
    $customers = $this->database->customers->aggregate([
      [
        '$lookup' => [
          'from' => 'bookings',
          'localField' => '_id',
          'foreignField' => 'customer_id',
          'as' => 'bookings'
        ]
      ]
    ]);
    return $customers->toArray();
  }

}

?>