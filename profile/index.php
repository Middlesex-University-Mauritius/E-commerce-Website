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

  <!-- Ticket sidebar -->
  <div id="right-sidebar" class="fixed top-0 -right-[400px] h-screen z-50 bg-white w-[400px] drop-shadow-lg border-l transition-all	duration-100">
    <div class="flex border-b p-5 justify-between">
      <p id="right-sidebar-header" class="text-xl text-gray-800">Tickets</p>
      <svg id="right-sidebar-close" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto text-gray-800 cursor-pointer hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>

    <div id="right-sidebar-content" class="p-5 overflow-y-auto h-screen"></div>
  </div>

  <div class="wrapper py-[77px]">
    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mt-8">Your Profile</h5>

    <div class="card p-0 mb-8">
      <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md justify-between">
        <p class="font-semibold">Your Personal Details</p>
        <a id="edit-details" href="/web/profile/edit/details/?active=details" class="text-blue-700 flex space-x-1 cursor-pointer select-none underline-none">
          <svg class="w-4 h-4 my-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
          <p class="text-blue-700 my-auto">Edit details</p>
        </a>
      </div>

      <div class="flex">
        <div class="w-48 my-auto py-2 px-5">
          <img class="rounded-full" src="/web/includes/img/avatar.png" alt="">
        </div>

        <div id="customer-fields" class="py-2 px-5 flex-auto"></div>
      </div>
    </div>

    <div class="card p-0">
      <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md">
        <p class="font-semibold">Your Bookings</p>
      </div>

      <div id="booking-table" class="p-5 flex-1 overflow-auto max-w-screen">
        <table>
          <thead>
            <tr>
              <th>Event</th>
              <th>Category</th>
              <th>Tickets</th>
              <th>Date</th>
              <th>Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="booking-data">
          </tbody>
        </table>
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