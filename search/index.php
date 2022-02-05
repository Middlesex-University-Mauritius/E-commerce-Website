<!DOCTYPE html>
<html lang="en">

<?php
include_once "../includes/head.php";
head();
?>

<body>
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <div class="wrapper my-10">
    <p class="text-3xl text-gray-700 mb-4">Search</p>

    <div id="events" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    </div>
  </div>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <script type="module" src="./js/index.js"></script>
</body>

</html>