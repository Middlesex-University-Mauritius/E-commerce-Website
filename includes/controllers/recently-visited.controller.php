<?php

require_once '../services/event.service.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$ids = $data["ids"] ?? null;

$eventService = new Event();

// Recently visited events
$events = $eventService->recentlyVisited($ids);

echo json_encode($events);

?>