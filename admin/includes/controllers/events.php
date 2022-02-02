<?php

require '../services/event.service.php';

$eventService = new Event();

$events = $eventService->getEvents();

echo $events;