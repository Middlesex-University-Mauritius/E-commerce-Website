<?php

require_once '../services/event.service.php';

$eventService = new Event();

// Get promoted events
$events = $eventService->getPromotedEvents();

echo json_encode($events);