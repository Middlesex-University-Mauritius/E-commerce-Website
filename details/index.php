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
    <div class="flex space-x-10 mt-8">
      <!-- Event details card -->
      <div class="flex-1 space-y-10">
        <div class="card">
          <p id="title" class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mb-4"></p>
          <!-- <img id="image" class="h-96 w-full object-cover" src="" alt="" srcset=""> -->

          <div id="slideshow-container">
          </div>

          <p id="description" class="mt-4"></p>
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
  </div>

  <script type="module" src="./js/index.js"></script>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

</body>

</html>