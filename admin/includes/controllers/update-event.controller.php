<?php

require '../services/event.service.php';

$id = $_GET["id"] ?? null;

$data = [
  "title" => $_POST["title"],
  "description" => $_POST["description"],
  "date" => $_POST["date"],
  "time" => $_POST["time"],
  "category" => ($_POST["category"]),
  "averagePrice" => json_decode($_POST["averagePrice"]),
  "tags" => json_decode($_POST["tags"]),
  "images" => json_decode($_POST["images"]),
  "prices" => json_decode($_POST["prices"]),
];

$payload = array();

$eventService = new Event();

$payload = $eventService->updateEvent($id, $data);
if (count(json_decode($_POST["images"])) >= 1) {
  $uploaded = $eventService->upload($id);
  if (!$uploaded) {
    $payload = array(
      "success" => false,
      "message" => "File uploading failed. Check if __images__ folder has the correct permissions"
    ); 
    echo json_encode($payload);
    exit();
  }
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