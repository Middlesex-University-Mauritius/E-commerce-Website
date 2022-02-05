<?php

require_once '../services/event.service.php';

$eventService = new Event();

$query = $_GET["query"] ?? null;

echo $eventService->getManyEventsByTitle($query);