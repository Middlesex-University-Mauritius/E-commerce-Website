<?php

require "../helpers/database.helper.php";

class Event extends DatabaseHelper {

  // Find all events
  function getManyEvents($category) {
    if (!$category) {
      $events = $this->database->events->aggregate([
        [
          '$lookup' => [
            'from' => 'bookings',
            'localField' => '_id',
            'foreignField' => 'event_id',
            'as' => 'bookings'
          ]
        ]
      ]);
    } else {
      $events = $this->database->events->find([
        'category' => $category
      ]);
    }

    return $events->toArray();
  }

  // Find events with search functionality and sorting options
  function getManyEventsByTitle($query, $field, $order) {
    $events = $this->database->events->find(
      [
        '$or' => [
          [
            'title' => new MongoDB\BSON\Regex("^$query", 'i')
          ],
          [
            'category' => new MongoDB\BSON\Regex("^$query", 'i')
          ],
          [
            'tags' => new MongoDB\BSON\Regex("^$query", 'i')
          ]
        ],
      ],
      [
        'sort' => [
          "$field" => json_decode($order)
        ]
      ]
    );

    return $events->toArray();
  }

  // Find one event using event id
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

    return $event->toArray();
  }

  function recentlyVisited($ids) {
    $formattedIds = array();

    foreach (json_decode($ids) as $id) {
      array_push($formattedIds, new MongoDB\BSON\ObjectID($id));
    }

    $events = $this->database->events->find([
      '_id' => [
        '$in' => $formattedIds
      ]
    ]);

    return $events->toArray();
  }

}

?>