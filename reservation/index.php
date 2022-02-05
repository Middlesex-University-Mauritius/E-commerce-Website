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

  <!-- Main modal -->
  <div id="defaultModal" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal h-full inset-0">
    <div class="relative px-4 w-full max-w-2xl h-full h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow">
        <!-- Modal header -->
        <div class="flex justify-between items-start p-5 rounded-t border-b">
          <h3 id="modal-title" class="text-xl font-semibold text-gray-900 lg:text-2xl">
            Proceed to checkout?
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-6">
          <p class="text-base leading-relaxed text-gray-500">
            Do you want to keep looking for more events or leave? If the item is still in your cart and you haven't checked out yet, you can adjust your seat positions later.
          </p>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
          <button id="continue" data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Proceed directly to checkout</button>
          <button id="return" data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Shop for more event</button>
        </div>
      </div>
    </div>
  </div>

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
          <button id="cart-button" data-modal-toggle="defaultModal" class="primary py-3 mt-4 w-full">Add to / Update cart</button>
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="./js/index.js"></script>
</body>

</html>