<!DOCTYPE html>
<html lang="en">

<?php
include_once "../includes/head.php";
head();
?>

<body id="body">
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <!-- Event details page -->
  <div class="wrapper my-10">
    <div class="flex space-x-10">
      <!-- Event details card -->
      <div class="flex-1 space-y-10">
        <div>
          <p id="title" class="text-2xl mb-4">Event title</p>
          <div class="card">
            <img class="h-64 w-full" src="https://generative-placeholders.glitch.me/image?width=1200&height=400&style=cellular-automata&cells=80" alt="" srcset="">
            <p id="description" class="mt-4">
              Event description Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget viverra sem. Maecenas cursus dui quis ornare consectetur. Nunc lobortis tempor ultricies. Donec quis lobortis sapien, in malesuada dolor. Event description Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget viverra sem. Maecenas cursus dui quis ornare consectetur. Nunc lobortis tempor ultricies. Donec quis lobortis sapien, in malesuada dolor.Event description Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget viverra sem. Maecenas cursus dui quis ornare consectetur. Nunc lobortis tempor ultricies. Donec quis lobortis sapien, in malesuada dolor.
            </p>
          </div>
        </div>
      </div>

      <!-- Venue preview card -->
      <div class="flex-1">
        <p class="text-2xl mb-4">Venue details</p>
        <div class="card">
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

          <a href="/web/reservation/?id=0"><button class="primary mt-4 w-full py-3">Get tickets</button></a>
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