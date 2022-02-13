<?php

require "../helpers/database.helper.php";
require "../../../vendor/autoload.php";

class Booking extends DatabaseHelper {

  function cancelBooking($booking_id, $customer_id) {
    // Find the booking to delete
    $deleteOneResult = $this->database->bookings->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($booking_id)]);
    // Get delete result
    $success = $deleteOneResult->getDeletedCount() == 1;

    if ($success) {
      $this->database->customers->updateOne(
        [
          '_id' => new \MongoDB\BSON\ObjectId($customer_id),
        ],
        [
          '$inc' => [
            'bookingQuantity' => -1
          ]
        ]
      );
    }

    $payload = [
      "success" => $success,
    ];
    return $payload;

  }

}

?>