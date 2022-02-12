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
    <?php
    include_once "../../includes/sidebar.inc.php";
    ?>

    <div id="booking-sidebar" class="fixed top-0 -right-[400px] h-screen z-30 bg-white w-[400px] drop-shadow-lg border-l transition-all	duration-100">
      <div class="flex border-b p-5 justify-between">
        <p id="sidebar-header" class="text-xl text-gray-800">Bookings</p>
        <svg id="sidebar-close" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto text-gray-800 cursor-pointer hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
      <div class="p-5">
        <ol id="sidebar-content" class="relative border-l border-gray-200 white:border-gray-700"></ol>
      </div>
    </div>

    <div class="w-full dashboard-content">

      <p class="text-3xl px-10 py-6 border-b w-full bg-white">
        <?php echo ucfirst(basename($_SERVER['PHP_SELF'], ".php")) ?>
      </p>

      <div class="flex-1 py-6 px-10">
        <div class="card p-0 mb-8">
          <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md">
            <p class="font-semibold">Filter options</p>
          </div>

          <div class="py-2 px-5">
            <div class="flex items-center space-x-2">
              <input id="bookings-only-filter" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
              <label class="cursor-pointer select-none" for="bookings-only-filter">Show people with bookings only</label>
            </div>
          </div>
        </div>

        <table>
          <thead>
            <tr>
              <th>Customer Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Age</th>
              <th>Bookings</th>
            </tr>
          </thead>
          <tbody id="customer-data">
          </tbody>
        </table>

      </div>
    </div>
  </div>
  <script type = "module" src = "./js/index.js"></script>
</body>

</html>
