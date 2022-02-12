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
$uploaded = $eventService->upload($payload["event_id"]);
if (!$uploaded) {
  $payload = array(
    "success" => false,
    "message" => "File uploading failed. Check if __images__ folder has the correct permissions"
  ); 
  echo json_encode($payload);
  exit();
}

if ($payload["success"]) {
  $payload = array(
    "success" => true,
    "message" => "Event created successfully"
  ); 
} else {
  $payload = array(
    "success" => false,
    "message" => "Unable to create event"
  );
}

echo json_encode($payload);