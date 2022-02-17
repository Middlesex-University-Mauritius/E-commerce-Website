<?php

require '../services/event.service.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$id = $data["id"] ?? null;
$status = $data["status"] ?? null;

$payload = array();

$eventService = new Event();

// Promote an event
$payload = $eventService->setPromoteStatus($id, $status);

if ($payload["success"]) {
  $payload = array(
    "success" => true,
    "message" => "Event promoted successfully"
  ); 
} else {
  $payload = array(
    "success" => false,
    "message" => "Unable to promote event"
  );
}

echo json_encode($payload);