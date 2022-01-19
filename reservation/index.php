<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/f2f51db1ed.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="../styles.css">
  <title>Document</title>
</head>

<body id="body">
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <div class="flex flex-row-reverse" id="reservation">
    <div class="sidebar">
      <div class="tabs-container">
        <p class="header">Your Tickets</p>
      </div>

      <div id="content">
        <p class="text-center text-gray-700 py-10">No tickets. click on seat to reserve.</p>
      </div>

      <div class="p-2 space-y-5 px-3 border-t pt-5">
        <div class="flex justify-between">
          <p>Subtotal</p>
          <div class="flex space-x-1">
            <span>Rs</span>
            <p id="subtotal">0</p>
          </div>
        </div>
        <p class="text-gray-700">The total will be calculated at the checkout page.</p>
        <button id="cart-button" class="primary py-3 mt-4 w-full">Add to cart</button>
      </div>
    </div>
  </div>

  <script type="module" src="./js/index.js"></script>
</body>

</html>