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

    <!-- Dashboard Wrapper -->
    <div class="dashboard-content w-full h-screen flex flex-col justify-between ml-40">

      <div>
        <!-- Page header -->
        <p class="text-3xl px-10 py-6 border-b w-full bg-white">
          <?php echo ucfirst(basename($_SERVER['PHP_SELF'], ".php")) ?>
        </p>

        <div class="flex-1 py-6 px-10">
          <!-- Event form -->
          <?php
          include_once '../../includes/event-form.php';
          renderForm();
          ?>
        </div>
      </div>

      <!-- Form cancel and confirm buttons -->
      <div class="w-full bg-white px-10 py-4 border-t">
        <div class="float-right flex space-x-4">
          <button class="cancel py-3 px-6 my-auto">Cancel</button>
          <button id="proceed" class="primary py-3 px-6 my-auto">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="./js/index.js"></script>
</body>

</html>