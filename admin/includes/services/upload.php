<?php

$sessionId = $_GET["sessionId"] ?? null;

if(isset($_FILES['sample_image']))
{
	$extension = pathinfo($_FILES['sample_image']['name'], PATHINFO_EXTENSION);

  $path = $_SERVER['DOCUMENT_ROOT'] . '/web/images/' . $sessionId;
  if (!file_exists($path)) {
      mkdir($path, 0777, true);
  }

	$new_name =  'image' . '.' . $extension;
  $path = $_SERVER['DOCUMENT_ROOT'] . '/web/images/' . $sessionId . '/' . $new_name;

	move_uploaded_file($_FILES['sample_image']['tmp_name'], $path);

	$data = array(
		'uploaded' => '/web/images/' . $sessionId . '/' . $new_name
	);

	echo json_encode($data);
}