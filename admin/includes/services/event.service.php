<?php

require "../helpers/database.helper.php";
require "../../../vendor/autoload.php";

class Event extends DatabaseHelper {

  function addEvent($data) {
    $datePosted = new \MongoDB\BSON\UTCDateTime();
    $payload = array();
    try {
      $insertOneResult = $this->database->events->insertOne([
        "title" => $data['title'],
        "description" => $data['description'],
        "date" => $data['date'],
        "time" => $data['time'],
        "category" => $data['category'],
        "tags" => $data['tags'],
        "images" => $data['images'],
        "datePosted" => $datePosted,
        "prices" => array(
          "regular" => intval($data['prices']['regular']),
          "premium" => intval($data['prices']['premium']),
          "vip" => intval($data['prices']['vip']),
        )
      ]);
      $payload = [
        "success" => $insertOneResult->getInsertedCount() == 1,
        "event_id" => $insertOneResult->getInsertedId(),
        "title" => $data['title']
      ];
    } catch (Exception $e) {
      $payload = [
        "success" => false,
        "event_id" => null,
        "title" => null
      ];
    }
    return $payload;
  }

  function getEvents() {
    $events = $this->database->events->find([]);
    return $this->prettifyList($events);
  }

}

?>