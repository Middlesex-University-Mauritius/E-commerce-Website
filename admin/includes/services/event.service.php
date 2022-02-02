<?php

require "../helpers/database.helper.php";

class Event extends DatabaseHelper {

  function addEvent($data) {
    $success = false;
    try {
      $insertOneResult = $this->database->events->insertOne([
        "title" => $data['title'],
        "description" => $data['description'],
        "date" => $data['date'],
        "time" => $data['time'],
        "category" => $data['category'],
        "tags" => $data['tags'],
        "image" => $data['image'],
        "prices" => array(
          "regular" => intval($data['prices']['regular']),
          "premium" => intval($data['prices']['premium']),
          "vip" => intval($data['prices']['vip']),
        ),
      ]);
      $success = $insertOneResult->getInsertedCount() == 1;
    } catch (Exception $e) {
      $success = false;
    }
    return $success;
  }

  function getEvents() {
    $events = $this->database->events->find([]);
    return $this->prettifyList($events);
  }

}

?>