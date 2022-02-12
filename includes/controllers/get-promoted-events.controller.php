<?php

require_once '../services/event.service.php';

$eventService = new Event();

$events = $eventService->getPromotedEvents();

echo json_encode($events);