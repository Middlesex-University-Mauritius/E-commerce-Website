<?php

require_once '../services/event.service.php';

$eventService = new Event();

$query = $_GET["query"] ?? null;

$events = $eventService->getManyEventsByTitle($query);

echo json_encode($events);