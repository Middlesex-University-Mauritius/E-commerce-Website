<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/f2f51db1ed.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../styles.css">
  <title>Document</title>
</head>

<body id="body">

  <div class="flex flex-row-reverse" id="reservation">
    <div class="sidebar flex-1">
      <div class="tabs-container">
        <button id="seats" class="tab active">Available Seats</button>
        <button id="tickets" class="tab">Your Tickets</button>
      </div>

    </div>
  </div>

  <script type="module" src="./js/mocks/vip.js"></script>
  <script type="module" src="./js/index.js"></script>
  <script type="module" src="../includes/js/scripts/storage.js"></script>
  <script type="module" src="../includes/js/view/venue.view.js"></script>
</body>

</html>