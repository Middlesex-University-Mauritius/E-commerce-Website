<?php

require "../helpers/database.helper.php";
require "../../../vendor/autoload.php";

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

class Event extends DatabaseHelper {

  // Delete an event
  function deleteEvent($id) {
    $bookings = $this->database->bookings->find([
      'event_id' => $id
    ]);

    // Notify admin about existing booking before deleting
    if ($bookings) {
      return [
        "success" => false,
        "message" => "There are some bookings related to this event. Cancel them first"
      ];
    };

    // Find the event to delete
    $deleteOneResult = $this->database->events->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
    // Get delete result
    $success = $deleteOneResult->getDeletedCount() == 1;

    if ($success) {
      // Delete the files and folders recursively
      $dir = $_SERVER['DOCUMENT_ROOT'] . '/web/__images__/' . $id;
      $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
      $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
      foreach($files as $file) {
        if ($file->isDir()){
          rmdir($file->getRealPath());
        } else {
          unlink($file->getRealPath());
        }
      }
      rmdir($dir);
    }

    // Return payload
    if ($success) {
      return [
        "success" => true,
        "message" => "Event deleted"
      ];
    } else {
      return [
        "success" => false,
        "message" => "Could not delete event"
      ];
    }

  }

  // Update promotion
  function setPromoteStatus($id, $status) {
    $payload = array();
    $modifyOneResult = $this->database->events->updateOne(
      [
        '_id' => new \MongoDB\BSON\ObjectId($id)
      ],
      [
        '$set' => [
          'promoted' => $status
        ]
      ]
    );
    $payload = [
      "success" => $modifyOneResult->getModifiedCount() == 1,
    ];
    return $payload;
  }

  // Update event with new data
  function updateEvent($id, $data) {
    // Get current time
    $updatedAt = new \MongoDB\BSON\UTCDateTime();
    $payload = array();
    try {
      // Prepare data to insert
      $insertData = [
        "title" => $data['title'],
        "description" => $data['description'],
        "date" => $data['date'],
        "time" => $data['time'],
        "category" => $data['category'],
        "tags" => $data['tags'],
        "updatedAt" => $updatedAt,
        "averagePrice" => $data['averagePrice'],
        "prices" => array(
          "regular" => intval($data['prices']->regular),
          "premium" => intval($data['prices']->premium),
          "vip" => intval($data['prices']->vip),
        )
      ];

      // Check if there are images to update
      if (count($data["images"]) >= 1) {
        $insertData["images"] = $data["images"];
      }
      
      // Update event with new data
      $modifyOneResult = $this->database->events->updateOne(
        [
          '_id' => new \MongoDB\BSON\ObjectId($id)
        ],
        [
          '$set' => $insertData
        ]
      );
      // Return payload
      $payload = [
        "success" => $modifyOneResult->getModifiedCount() == 1,
      ];
    } catch (Exception $e) {
      $payload = [
        "success" => false,
      ];
    }
    return $payload;
  }

  function addEvent($data) {
    $datePosted = new \MongoDB\BSON\UTCDateTime();
    $payload = array();
    try {
      $insertOneResult = $this->database->events->insertOne([
        "title" => $data['title'],
        "description" => $data['description'],
        "date" => $data['date'],
        "time" => $data['time'],
        "category" => $data['category'],
        "tags" => $data['tags'],
        "images" => $data['images'],
        "datePosted" => $datePosted,
        "updatedAt" => $datePosted,
        "averagePrice" => $data['averagePrice'],
        "prices" => array(
          "regular" => intval($data['prices']->regular),
          "premium" => intval($data['prices']->premium),
          "vip" => intval($data['prices']->vip),
        )
      ]);
      $payload = [
        "success" => $insertOneResult->getInsertedCount() == 1,
        "event_id" => $insertOneResult->getInsertedId(),
        "title" => $data['title']
      ];
    } catch (Exception $e) {
      $payload = [
        "success" => false,
        "event_id" => null,
        "title" => null
      ];
    }
    return $payload;
  }

  // Delete a directory with content inside it
  function deleteParentDirectory($directory) {
    if (! is_dir($directory)) return;
    if (substr($directory, strlen($directory) - 1, 1) != '/') {
      $directory .= '/';
    }
    $files = glob($directory . '*', GLOB_MARK);
    foreach ($files as $file) {
      if (is_dir($file)) {
        self::deleteDir($file);
      } else {
        unlink($file);
      }
    }
    rmdir($directory);
  }

  // Update images
  function upload($event_id) {
    $pass = true;
    if($_FILES['file'])
    {
      $root = $_SERVER['DOCUMENT_ROOT'] . '/web/__images__/' . $event_id;
      // Delete parent directory if already exists
      if (file_exists($root)) {
        $this->deleteParentDirectory($root);
      }

      // Create the image folder
      mkdir($root, 0777, true);

      // Upload image one by one
      $count = count($_FILES['file']['name']);
      for ($i = 0; $i < $count; $i++) {

        $extension = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
        $file_name = $_FILES["file"]["name"][$i];
        $file_tmp_name = $_FILES["file"]["tmp_name"][$i];
        $error = $_FILES["file"]["error"][$i];

        $upload_name = 'image-'."$i.".$extension;

        $file_path = '/web/__images__/' . $event_id . '/' . $upload_name;
        if (!move_uploaded_file($file_tmp_name , $_SERVER['DOCUMENT_ROOT'].$file_path)) {
          $pass = false;
        }
      }
    }
    return $pass;
  }

}

?>