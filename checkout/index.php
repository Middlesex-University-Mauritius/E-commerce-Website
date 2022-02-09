<!DOCTYPE html>
<html lang="en">

<?php
include_once "../includes/head.php";
head();
?>

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
            Delete booking from cart?
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-6">
          <p class="text-base leading-relaxed text-gray-500">
            The event will be removed from your cart
          </p>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
          <button id="delete" data-modal-toggle="defaultModal" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</button>
          <button id="return" data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="wrapper py-[77px]">
    <div class="my-8">

      <!-- Checkout page page -->
      <div class="flex mb-4 space-x-2">
        <p class="text-2xl">Cart</p>
        <!-- Cart counter -->
        <p class="text-2xl" id="checkout-count">(0)</p>
      </div>

      <div class="flex space-x-10">
        <div class="flex-1 space-y-8">
          <!-- Items in cart -->
          <div class="card">
            <div id="cart">
            </div>
          </div>

          <div>
            <!-- Customer information card -->
            <p class="text-2xl mb-4">Customer Information</p>
            <div class="card">
              <div>
                <p class="text-gray-700">Street Address</p>
                <input class="my-2 w-full" type="text" id="streetAddress" name="streetAddress">
              </div>

              <div class="grid grid-cols-3 gap-4">
                <div>
                  <p class="text-gray-700">District</p>
                  <input class="my-2 w-full" type="text" id="district" name="district">
                </div>
                <div>
                  <p class="text-gray-700">Zip code</p>
                  <input class="my-2 w-full" type="text" id="zipCode" name="zipCode">
                </div>
                <div>
                  <p class="text-gray-700">House Number</p>
                  <input class="my-2 w-full" type="text" id="houseNumber" name="houseNumber">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Payment cart -->
        <div class="w-[500px]">
          <div class="card">
            <div class="mb-10">
              <p class="text-xl mb-5">Payment Details</p>

              <div class="space-y-3 text-gray-600">
                <div class="flex justify-between">
                  <p>Subtotal</p>
                  <div class="flex space-x-1">
                    <span>Rs</span>
                    <p id="subtotal">0</p>
                  </div>
                </div>

                <div class="flex justify-between">
                  <p>VAT</p>
                  <p>15%</p>
                </div>
              </div>
            </div>

            <!-- Finance stuff -->
            <div class="flex justify-between border-t py-4">
              <p class="text-xl">Total</p>
              <div class="flex space-x-1">
                <span class="text-xl">Rs</span>
                <p id="total" class="text-xl">0</p>
              </div>
            </div>

            <button id="place-order" class="primary py-3 mt-4 w-full flex justify-center space-x-2">
              <div id="place-order-loader"></div>
              <p class="text-center">Place order</p>
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <script type="module" src="../includes/js/scripts/storage.js"></script>
  <script type="module" src="./js/index.js"></script>
</body>

</html>