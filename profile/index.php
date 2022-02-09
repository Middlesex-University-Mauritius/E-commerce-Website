<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once "../includes/head.php";
head(true);
?>
</head>

<body id="body">
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <div class="wrapper py-[77px]">
    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mt-8">Your Profile</h5>

    <div class="card p-0 mb-8">
      <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md">
        <p class="font-semibold">Your Personal Details</p>
      </div>

      <div class="flex">
        <div class="w-48 my-auto py-2 px-5">
          <img class="rounded-full" src="/web/includes/img/avatar.png" alt="">
        </div>

        <div class="py-2 px-5 flex-auto">
          <div class="border-b flex justify-between py-3">
            <p class="font-medium">Full Name</p>
            <p id="full-name" class="text-gray-700"></p>
          </div>

          <div class="border-b flex justify-between py-3">
            <p class="font-medium">Email Address</p>
            <p id="email" class="text-gray-700"></p>
          </div>

          <div class="border-b flex justify-between py-3">
            <p class="font-medium">Age</p>
            <p id="age" class="text-gray-700"></p>
          </div>

          <div class="flex justify-between py-3">
            <p class="font-medium">Phone</p>
            <p id="phone" class="text-gray-700"></p>
          </div>
        </div>
      </div>
    </div>

    <div class="card p-0">
      <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md">
        <p class="font-semibold">Your Bookings</p>
      </div>

      <div class="p-5">

        <table hidden id="customer-bookings">
          <tr>
            <th>Event Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Tickets</th>
            <th>Date</th>
            <th>Total</th>
          </tr>
        </table>

        <p id="customer-bookings-empty">You did not order anything yet</p>
      </div>
    </div>
  </div>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <script type="module" src="./js/index.js"></script>

</body>

</html>