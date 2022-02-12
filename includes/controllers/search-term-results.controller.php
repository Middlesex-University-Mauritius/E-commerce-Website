<?php

require_once '../services/event.service.php';

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$tags = $data["tags"] ?? null;

$eventService = new Event();

$events = $eventService->searchTermResults($tags);

echo json_encode($events);

?>