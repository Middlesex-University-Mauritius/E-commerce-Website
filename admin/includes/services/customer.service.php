<?php

require "../helpers/database.helper.php";
require "../../../vendor/autoload.php";

class Customer extends DatabaseHelper {

  function getCustomers($withBookingQuantity = false) {
    $lookup = [
      '$lookup' => [
        'from' => 'bookings',
        'localField' => '_id',
        'foreignField' => 'customer_id',
        'as' => 'bookings'
      ]
    ];

    $otherOptions = [
      '$match' => [
        'bookingQuantity' => [
          '$gte' => 1
        ]
      ]
    ];

    $pipeline = [$lookup];

    if ($withBookingQuantity == true) {
      $pipeline = [$lookup, $otherOptions];
    }

    $customers = $this->database->customers->aggregate($pipeline);
    return $customers->toArray();
  }

}

?>