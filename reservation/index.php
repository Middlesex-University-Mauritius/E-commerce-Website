<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once "../includes/head.php";
head();
?>
</head>

<body id="body">
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <div class="pt-[77px]">
    <!-- Reservation page -->
    <div class="flex flex-row-reverse" id="reservation">
      <!-- Venue preview -->

      <!-- Sidebar -->
      <div class="sidebar">
        <div class="tabs-container">
          <p class="header">Your Tickets</p>
        </div>

        <!-- Empty message when no seats selected -->
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
          <button id="cart-button" class="primary py-3 mt-4 w-full">
            Checkout
          </button>
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="./js/index.js"></script>
</body>

</html>