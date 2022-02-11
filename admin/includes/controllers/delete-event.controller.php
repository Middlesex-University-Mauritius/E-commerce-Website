<?php

require '../services/event.service.php';

$id = $_GET["id"] ?? null;

$payload = array();

$eventService = new Event();

$payload = $eventService->deleteEvent($id);

if ($payload["success"]) {
  $payload = array(
    "success" => true,
    "message" => "Event deleted successfully"
  ); 
} else {
  $payload = array(
    "success" => false,
    "message" => "Unable to delete event"
  );
}

echo json_encode($payload);