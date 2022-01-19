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

<body>
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <div class="wrapper">
    <div class="my-8">

      <p class="text-2xl mb-4">Cart</p>

      <div class="flex space-x-10">
        <div class="flex-1 space-y-8">

          <!-- <div class="card">
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
          </div> -->

          <div class="card">
            <div id="cart">
            </div>
          </div>

        </div>

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