<?php

require '../services/event.service.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$payload = array();

$eventService = new Event();

$payload = $eventService->addEvent($data);

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