<?php

require '../services/event.service.php';

$data = [
  "title" => $_POST["title"],
  "description" => $_POST["description"],
  "date" => $_POST["date"],
  "time" => $_POST["time"],
  "category" => ($_POST["category"]),
  "tags" => json_decode($_POST["tags"]),
  "images" => json_decode($_POST["images"]),
  "prices" => json_decode($_POST["prices"]),
];

$payload = array();

$eventService = new Event();

$payload = $eventService->addEvent($data);
$eventService->upload($payload["event_id"]);

if ($payload["success"]) {
  $payload = array(
    "success" => true,
    "message" => "Event created successfully",
    "event" => array(
      "event_id" => $payload["event_id"],
      "title" => $payload["title"]
    )
  ); 
} else {
  $payload = array(
    "success" => false,
    "message" => "Unable to create event",
    "event" => null
  );
}

echo json_encode($payload);