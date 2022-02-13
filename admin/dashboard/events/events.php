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

      <div id="event-table" class="flex-1 py-6 px-10">
        <table>
          <thead>
            <tr>
              <th>Product</th>
              <th>List Price</th>
              <th>Tickets</th>
              <th>Promoted</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="event-data">
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <script type="module" src="./js/index.js"></script>
</body>

</html>