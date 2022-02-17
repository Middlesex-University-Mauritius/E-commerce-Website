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

  <div class="wrapper py-[77px]">
    <div class="flex space-x-2">
      <p class="text-3xl text-gray-700 mb-4 mt-8">Search</p>
      <p id="query" class="text-3xl text-gray-700 mb-4 mt-8"></p>
    </div>

    <!-- Two way sort dropdown -->
    <div class="mb-4 max-w-[200px]">
      <label for="sort-options" class="block mb-2 text-sm font-medium text-gray-900">Sort by:</label>
      <select id="sort-options" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option value="date-newest">Date: Newest</option>
        <option value="date-oldest">Date: Oldest</option>
        <option value="price-low-high">Price: Low to High</option>
        <option value="price-high-low">Price: High to Low</option>
      </select>
    </div>

    <!-- Dropdown menu -->
    <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
      <ul class="py-1" aria-labelledby="dropdownButton">
        <li><a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Price: Low to High</a></li>
        <li><a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Price: High to Low</a></li>
        <li><a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Date: Most Recent</a></li>
        <li><a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Date: Oldest</a></li>
      </ul>
    </div>

    <div id="events" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"></div>
  </div>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <script type="module" src="./js/index.js"></script>
</body>

</html>