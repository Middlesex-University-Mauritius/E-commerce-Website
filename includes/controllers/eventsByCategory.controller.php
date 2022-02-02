<?php

require_once '../services/event.service.php';

$eventService = new Event();

$category = $_GET["category"] ?? null;

echo $eventService->getManyEvents($category);