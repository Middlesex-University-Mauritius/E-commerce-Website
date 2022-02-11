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
    <div class="flex flex-row-reverse relative" id="reservation">
      <!-- keys -->
      <div class="card absolute top-0 left-0 mx-10 my-10 p-0 min-w-[200px] select-none z-50">
        <div id="keys-title" class="bg-gray-50 border-b p-1 flex space-x-2 rounded-t-md hover:bg-gray-100 flex justify-between cursor-pointer">
          <p class="font-semibold text-sm">Keys</p>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
          </svg>
        </div>
        <div id="keys-content" class="p-1 fade space-y-2">
          <div class="flex space-x-2">
            <i class="fas fa-check rounded-full bg-[#A4A5A7] text-[#A4A5A7] p-[4px] text-[12px]"></i>
            <p class="text-sm my-auto">Empty seat</p>
          </div>
          <div class="flex space-x-2">
            <i class="fas fa-check rounded-full bg-[#0F1D30] text-[#0F1D30] p-[4px] text-[12px]"></i>
            <p class="text-sm my-auto">Booked by other people</p>
          </div>
          <div class="flex space-x-2">
            <i class="fas fa-check rounded-full bg-[#1AAF32] text-white p-[4px] text-[12px]"></i>
            <p class="text-sm my-auto">Seat that you booked</p>
          </div>
        </div>
      </div>

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
          <button disabled id="cart-button" class="primary py-3 mt-4 w-full">
            Checkout
          </button>
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="./js/index.js"></script>
</body>

</html>