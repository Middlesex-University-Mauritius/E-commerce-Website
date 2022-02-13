<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once "../../includes/head.php";
  head();
  ?>
</head>

<body id="body">
  <div class="flex">
    <!-- Sidebar -->
    <?php
    include_once "../../includes/sidebar.inc.php";
    ?>

    <!-- Ticket sidebar -->
    <div id="right-sidebar" class="fixed top-0 -right-[400px] h-screen z-30 bg-white w-[400px] drop-shadow-lg border-l transition-all	duration-100">
      <div class="flex border-b p-5 justify-between">
        <p id="right-sidebar-header" class="text-xl text-gray-800">Tickets</p>
        <svg id="right-sidebar-close" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto text-gray-800 cursor-pointer hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
      <div style="height: calc(100vh - 69px)" class="flex flex-col justify-between">
        <div class="p-5 overflow-y-auto" id="right-sidebar-content"></div>
        <div class="p-4">
          <button id="cancel-booking-button" class="warning px-4 py-2 w-full">Cancel booking</button>
        </div>
      </div>
    </div>

    <!-- Dashboard wrapper -->
    <div class="w-full dashboard-content">

      <!-- Dashboard header -->
      <p class="text-3xl px-10 py-6 border-b w-full bg-white">
        <?php echo ucfirst(basename($_SERVER['PHP_SELF'], ".php")) ?>
      </p>

      <div class="flex-1 py-6 px-10">

        <!-- Bookings -->
        <div id="booking-table">
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Category</th>
                <th>Tickets</th>
                <th>Charge</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="booking-data">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="./js/index.js"></script>
</body>

</html>