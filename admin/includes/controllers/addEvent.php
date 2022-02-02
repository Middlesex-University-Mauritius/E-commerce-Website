<?php

require '../services/event.service.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$payload = array();

$eventService = new Event();

$success = $eventService->addEvent($data);

if ($success) {
  $payload = array(
    "success" => true,
    "message" => "Event created successfully",
    "event" => array(
      "event_id" => $insertOneResult->getInsertedId(),
      "title" => $title
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