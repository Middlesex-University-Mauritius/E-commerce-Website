<?php

require "../helpers/database.helper.php";

class Booking extends DatabaseHelper {

  function getManyBookings($customerId) {
    $bookings = $this->database->bookings->aggregate([
      [
        '$match' => [
          'customer_id' => new MongoDB\BSON\ObjectID($customerId)
        ]
      ],
      [
        '$lookup' => [
          'from' => 'customers',
          'localField' => 'customer_id',
          'foreignField' => '_id',
          'as' => 'customer'
        ]
      ],
      [
        '$unwind' => [
          'path' => '$customer',
          'preserveNullAndEmptyArrays' => true,
        ]
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
        '$unwind' => [
          'path' => '$event',
          'preserveNullAndEmptyArrays' => true,
        ]
      ],
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