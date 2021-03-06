<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once "../includes/head.php";
head();
?>
<script type="module" src="/web/includes/js/scripts/slide.js"></script>
</head>

<body id="body">
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <!-- Event details page -->
  <div class="wrapper py-[77px]">
    <nav class="flex py-6" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="/web/home" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">
            <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            Home
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="/web/events" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">Events</a>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <span id="current" class="ml-1 text-sm font-medium text-gray-400 md:ml-2">Flowbite</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="flex space-x-10">
      <!-- Event details card -->
      <div class="flex-1 space-y-10">
        <div class="card">
          <p id="title" class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mb-4"></p>
          <!-- <img id="image" class="h-96 w-full object-cover" src="" alt="" srcset=""> -->

          <div id="slideshow-container">
          </div>

          <p id="description" class="mt-4"></p>
        </div>

        <div>
          <h5 class="text-2xl font-bold tracking-tight text-gray-900 mt-8 mb-4">Price of Seats</h5>
          <div class="grid grid-cols-3 gap-4"> 
            <div class="p-4 max-w-sm bg-white rounded-lg border shadow-md sm:p-8">
              <h3 class="mb-4 text-xl font-medium text-gray-500">Regular</h3>
              <div class="flex items-baseline text-gray-900">
                <span class="text-xl font-semibold">Rs</span>
                <span id="regular-price" class="text-2xl font-extrabold tracking-tight">49</span>
                <span class="ml-1 text-lg font-normal text-gray-500">/seat</span>
              </div>
            </div>       

            <div class="p-4 max-w-sm bg-white rounded-lg border shadow-md sm:p-8">
              <h3 class="mb-4 text-xl font-medium text-gray-500">Premium</h3>
              <div class="flex items-baseline text-gray-900">
                <span class="text-xl font-semibold">Rs</span>
                <span id="premium-price" class="text-2xl font-extrabold tracking-tight">49</span>
                <span class="ml-1 text-lg font-normal text-gray-500">/seat</span>
              </div>
            </div>       

            <div class="p-4 max-w-sm bg-white rounded-lg border shadow-md sm:p-8">
              <h3 class="mb-4 text-xl font-medium text-gray-500">VIP</h3>
              <div class="flex items-baseline text-gray-900">
                <span class="text-xl font-semibold">Rs</span>
                <span id="vip-price" class="text-2xl font-extrabold tracking-tight">49</span>
                <span class="ml-1 text-lg font-normal text-gray-500">/seat</span>
              </div>
            </div>       
          </div>
        </div>
      </div>

      <!-- Venue preview card -->
      <div class="w-[600px]">
        <div class="card p-0">
          <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md">
            <p class="font-semibold">Venue details</p>
          </div>

          <div class="p-5">
            <div id="card-venue"></div>
            <!-- Other details -->
            <div class="flex flex-col space-y-2 mt-8">
              <div>
                <i class="fas fa-map-marker-alt"></i>
                <span>Garden of eden</span> 
              </div>
              <div>
                <i class="far fa-clock"></i>
                <span id="time">8 pm</span> 
              </div>
              <div>
                <i class="fas fa-calendar-alt"></i>
                <span id="date">date</span> 
              </div>
            </div>

            <a id="link" href="/web/home"><button class="primary mt-4 w-full py-3">Get tickets</button></a>
          </div>
        </div>
      </div>
    </div>

    <div class="border-t mt-10">
      <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mt-8">Recommended based on your searches</h5>
      <div id="search-term" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"></div>
    </div>
  </div>

  <script type="module" src="./js/index.js"></script>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <!-- Search Term Results Module -->
  <script type="module" src="../includes/js/scripts/recommendation/searchTerm.js"></script>

</body>

</html>