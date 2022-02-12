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

  <div class="wrapper py-[100px]">
    <div class="bg-green-200 p-4 rounded-md">
      <div class="flex items-center">
        <svg class="mr-2 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <h3 class="text-lg font-medium text-green-700 dark:text-green-800">Checkout successful</h3>
      </div>
      <div class="mt-2 text-sm text-green-700 dark:text-green-800">
        We hope your enjoy your purchase and see you in our shop again.
      </div>
    </div>

    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mt-8">Recommended based on your searches</h5>
    <div id="search-term" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"></div>
  </div>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <!-- Search Term Results Module -->
  <script type="module" src="../includes/js/scripts/recommendation/searchTerm.js"></script>

</body>

</html>