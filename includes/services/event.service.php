<?php

require "../helpers/database.helper.php";

class Event extends DatabaseHelper {

  function getManyEvents($category) {
    if (!$category) {
      $events = $this->database->events->find([]);
    } else {
      $events = $this->database->events->find([
        'category' => $category
      ]);
    }

    return $this->prettifyList($events);
  }

  function getManyEventsByTitle($query) {
    $events = $this->database->events->find([
      'title' => new MongoDB\BSON\Regex("^watch", 'i')
    ]);

    return $this->prettifyList($events);
  }

  function getOneEvent($id) {
    $event = $this->database->events->aggregate([
      [
        '$match' => [
          '_id' => new MongoDB\BSON\ObjectID($id)]
        ],
      [
        '$lookup' => [
          'from' => 'bookings',
          'localField' => '_id',
          'foreignField' => 'event_id',
          'as' => 'bookings'
        ]
      ],
      [
        '$unwind' => [
          'path' => '$bookings',
          'preserveNullAndEmptyArrays' => true,
        ]
      ],
      [
        '$lookup' => [
          'from' => 'customers',
          'localField' => 'bookings.customer_id',
          'foreignField' => '_id',
          'as' => 'bookings.customer'
        ]
      ],
      [
        '$unwind' => [
          'path' => '$bookings.customer',
          'preserveNullAndEmptyArrays' => true,
        ]
      ]
    ]);

    return $this->prettifyList($event);
  }

}

?>