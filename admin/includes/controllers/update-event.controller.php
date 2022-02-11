<?php

require '../services/event.service.php';

$id = $_GET["id"] ?? null;

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

$payload = $eventService->updateEvent($id, $data);
if (count(json_decode($_POST["images"])) >= 1) {
  $eventService->upload($id);
}

if ($payload["success"]) {
  $payload = array(
    "success" => true,
    "message" => "Event updated successfully"
  ); 
} else {
  $payload = array(
    "success" => false,
    "message" => "Unable to update event"
  );
}

echo json_encode($payload);