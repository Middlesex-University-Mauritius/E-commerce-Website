<?php

require_once '../services/event.service.php';

$eventService = new Event();

$query = $_GET["query"] ?? null;

$events = $eventService->getManyEventsByTitle($query);

json_encode($events);