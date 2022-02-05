<?php

require_once '../services/event.service.php';

$eventService = new Event();

$id = $_GET["id"] ?? null;

echo $eventService->getOneEvent($id);