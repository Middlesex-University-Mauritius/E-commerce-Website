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

  <div class="wrapper">
    <div class="mt-10 mb-5 flex justify-between">
      <p class="text-3xl text-gray-700">Events</p>
    </div>

    <ul class="flex flex-wrap border-b border-gray-200 white:border-gray-700">
      <li class="mr-2">
        <a id="live-music" href="#" class="font-medium text-blue-600 bg-gray-100 active inline-block py-4 px-4 text-sm text-center rounded-t-lg white:bg-gray-800 white:text-blue-500">Live Music</a>
      </li>
      <li class="mr-2">
        <a id="stand-up" href="#" class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 white:text-gray-400 white:hover:bg-gray-800 white:hover:text-gray-300">Stand Up</a>
      </li>
      <li class="mr-2">
        <a id="arts-and-theater" href="#" class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 white:text-gray-400 white:hover:bg-gray-800 white:hover:text-gray-300">Arts & Theater</a>
      </li>
    </ul>


    <br>

    <!-- Display events in shrinked mode -->
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