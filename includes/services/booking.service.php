<?php

require "../helpers/database.helper.php";

class Booking extends DatabaseHelper {

  // Get bookings using aggregate function. Populate event using eventId and customer using customer_id
  function getBookings() {
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

    return $bookings->toArray();
  }

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

    return $bookings->toArray();
  }

  function addBooking($booking) {
    // Increment bookings count
    $insertResult = $this->database->bookings->insertOne($booking);

    // Return successful if customer added
    $success = $insertResult->getInsertedCount() == 1;

    if ($success) {
      $this->database->customers->updateOne(
        [
          '_id' => $booking["customer_id"],
        ],
        [
          '$inc' => [
            'bookingQuantity' => 1
          ]
        ]
      );
    }

    return [
      "success" => $success,
      "booking_id" => (string)$insertResult->getInsertedId()
    ];
  }
}

?>