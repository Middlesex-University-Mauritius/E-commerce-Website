<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once "../includes/head.php";
head();
?>
</head>

<body id="body">
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <?php
  if (isset($_COOKIE["userId"])) {
  } else {
    header("Location: /web/home");
    exit();
  }
  ?>

    <div class="wrapper py-[77px]">
    <p class="text-3xl mb-4 mt-8">Your Bookings</p>

    <!-- Bookings -->
    <ol id="bookings" class="relative border-l border-gray-200 white:border-gray-700">
    </ol>

    <!-- Empty bookings -->
    <p id="bookings-empty">You did not order anything yet</p>

  </div>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <script type="module" src="./js/index.js"></script>

</body>

</html>