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

  <div class="wrapper my-10">
    <p class="text-3xl mb-4">Your Profile</p>

    <div class="card p-0 mb-8">
      <div class="bg-gray-50 border-b p-5 flex space-x-2">
        <p class="font-semibold">Your Personal Details</p>
      </div>

      <div class="flex">
        <div class="w-48 my-auto py-2 px-5">
          <img class="rounded-full" src="/web/includes/img/avatar.png" alt="">
        </div>

        <div class="py-2 px-5 flex-auto">
          <div class="border-b flex justify-between py-3">
            <p class="font-medium">Full Name</p>
            <p id="full-name" class="text-gray-700">Chu chu</p>
          </div>

          <div class="border-b flex justify-between py-3">
            <p class="font-medium">Email Address</p>
            <p id="email" class="text-gray-700">Chu chu</p>
          </div>

          <div class="border-b flex justify-between py-3">
            <p class="font-medium">Age</p>
            <p id="age" class="text-gray-700">12</p>
          </div>

          <div class="flex justify-between py-3">
            <p class="font-medium">Phone</p>
            <p id="phone" class="text-gray-700">45929123</p>
          </div>
        </div>
      </div>
    </div>

    <div class="card p-0">
      <div class="bg-gray-50 border-b p-5 flex space-x-2">
        <p class="font-semibold">Your Orders</p>
      </div>

      <div class="p-5">
        <p>You did not order anything yet</p>
      </div>
    </div>
  </div>

  <script type="module" src="./js/index.js"></script>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <script type="module" src="./js/index.js"></script>

</body>

</html>