<?php

require_once '../services/event.service.php';

$eventService = new Event();

$id = $_GET["id"] ?? null;

$event = $eventService->getOneEvent($id);

echo json_encode($event);