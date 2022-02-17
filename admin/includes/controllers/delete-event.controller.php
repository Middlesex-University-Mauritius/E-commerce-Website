<?php

require '../services/event.service.php';

$id = $_GET["id"] ?? null;

$payload = array();

$eventService = new Event();

// Delete the event
$deleteEvent = $eventService->deleteEvent($id);

$payload = [
  "success" => $deleteEvent["success"],
  "message" => $deleteEvent["message"]
];

echo json_encode($payload);