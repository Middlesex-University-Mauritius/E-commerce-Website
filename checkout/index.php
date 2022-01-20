<!DOCTYPE html>
<html lang="en">

<?php
include_once "../includes/head.php";
head();
?>

<body>
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <div class="wrapper">
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
                <input class="my-2 w-full" type="text" id="street-address" name="street-address">
              </div>

              <div class="grid grid-cols-3 gap-4">
                <div>
                  <p class="text-gray-700">District</p>
                  <input class="my-2 w-full" type="text" id="district" name="district">
                </div>
                <div>
                  <p class="text-gray-700">Zip code</p>
                  <input class="my-2 w-full" type="text" id="zip-code" name="zip-code">
                </div>
                <div>
                  <p class="text-gray-700">House Number</p>
                  <input class="my-2 w-full" type="text" id="house-number" name="house-number">
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
                  <p>Rs 7,200</p>
                </div>

                <div class="flex justify-between">
                  <p>VAT</p>
                  <p>25%</p>
                </div>
              </div>
            </div>

            <!-- Finance stuff -->
            <div class="flex justify-between border-t py-4">
              <p class="text-xl">Total</p>
              <p class="text-xl">Rs 9,000</p>
            </div>

            <button class="primary py-3 mt-4 w-full">Place order</button>
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