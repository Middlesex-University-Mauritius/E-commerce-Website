<?php

require "../helpers/database.helper.php";

class Booking extends DatabaseHelper {

  function getManyBookings($category) {
    $bookings = $this->database->bookings->aggregate([
      [
        '$lookup' => [
          'from' => 'customers',
          'localField' => 'customer_id',
          'foreignField' => '_id',
          'as' => 'customer'
        ]
      ],
      [
        '$unwind' => '$customer'
      ],
      [
        '$lookup' => [
          'from' => 'events',
          'localField' => 'event_id',
          'foreignField' => '_id',
          'as' => 'event'
        ]
      ],
      [
        '$unwind' => '$event'
      ]
    ]);

    return $this->prettifyList($bookings);
  }

  function addBooking($booking) {
    $insertResult = $this->database->bookings->insertOne($booking);
    $success = $insertResult->getInsertedCount() == 1;
    return $success;
  }

}

?>