<?php

require_once '../services/event.service.php';

$eventService = new Event();

$category = $_GET["category"] ?? null;

// Get many events by category
$events = $eventService->getManyEvents($category);

echo json_encode($events);