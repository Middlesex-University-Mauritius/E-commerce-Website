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

    <div class="w-full dashboard-content">

      <p class="text-3xl px-10 py-6 border-b w-full bg-white">
        <?php echo ucfirst(basename($_SERVER['PHP_SELF'], ".php")) ?>
      </p>

      <div class="flex-1 py-6 px-10">
        <table id="customer-data">
          <tr>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Age</th>
            <th>Bookings</th>
          </tr>
        </table>

      </div>
    </div>
  </div>
  <script type = "module" src = "./js/index.js"></script>
</body>

</html>
