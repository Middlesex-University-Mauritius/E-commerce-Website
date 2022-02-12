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

    <!-- Dashboard wrapper -->
    <div class="w-full dashboard-content">

      <!-- Dashboard header -->
      <p class="text-3xl px-10 py-6 border-b w-full bg-white">
        <?php echo ucfirst(basename($_SERVER['PHP_SELF'], ".php")) ?>
      </p>

      <div class="flex-1 py-6 px-10">

        <!-- Bookings -->
        <div class='flex space-x-10'>
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Category</th>
                <th>Tickets</th>
                <th>Charge</th>
              </tr>
            </thead>
            <tbody id="order-data">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="./js/index.js"></script>
</body>

</html>