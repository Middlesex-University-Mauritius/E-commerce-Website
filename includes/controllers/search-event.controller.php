<?php

require_once '../services/event.service.php';

$eventService = new Event();

$query = $_GET["query"] ?? null;
$field = $_GET["field"] ?? null;
$order = $_GET["order"] ?? null;

$events = $eventService->getManyEventsByTitle($query, $field, $order);

echo json_encode($events);