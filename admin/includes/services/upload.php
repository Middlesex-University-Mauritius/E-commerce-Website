<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

$sessionId = $_GET["sessionId"] ?? null;

$response = array();

if($_FILES['file'])
{
  $root = $_SERVER['DOCUMENT_ROOT'] . '/web/images/' . $sessionId;
  if (!file_exists($root)) {
    mkdir($root, 0777, true);
  }

  $count = count($_FILES['file']['name']);
  for ($i = 0; $i < $count; $i++) {

    $extension = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
    $file_name = $_FILES["file"]["name"][$i];
    $file_tmp_name = $_FILES["file"]["tmp_name"][$i];
    $error = $_FILES["file"]["error"][$i];

    $upload_name = 'image-'."$i.".$extension;

    $file_path = '/web/images/' . $sessionId . '/' . $upload_name;

    if(move_uploaded_file($file_tmp_name , $_SERVER['DOCUMENT_ROOT'].$file_path)) {
      array_push($response, $file_path);
    }
  }
}

echo json_encode($response);
?>