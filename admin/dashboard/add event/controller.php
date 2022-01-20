<?php

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$title = $data['title'];
$description = $data['description'];
$date = $data['date'];
$time = $data['time'];
$category = $data['category'];
