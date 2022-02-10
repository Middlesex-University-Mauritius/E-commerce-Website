<?php

require_once '../services/event.service.php';

$ids = $_GET["ids"] ?? [];

$eventService = new Event();

$events = $eventService->recentlyVisited($ids);

echo json_encode($events);

?>