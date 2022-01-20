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

  <div class="wrapper my-10">
    <div class="flex space-x-10">
      <div class="flex-1 space-y-10">
        <div>
          <p class="text-2xl mb-4">Event title</p>
          <div class="card">
            <img class="h-64 w-full" src="https://generative-placeholders.glitch.me/image?width=1200&height=400&style=cellular-automata&cells=80" alt="" srcset="">
            <p class="mt-4">
              Event description Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget viverra sem. Maecenas cursus dui quis ornare consectetur. Nunc lobortis tempor ultricies. Donec quis lobortis sapien, in malesuada dolor. Event description Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget viverra sem. Maecenas cursus dui quis ornare consectetur. Nunc lobortis tempor ultricies. Donec quis lobortis sapien, in malesuada dolor.Event description Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget viverra sem. Maecenas cursus dui quis ornare consectetur. Nunc lobortis tempor ultricies. Donec quis lobortis sapien, in malesuada dolor.
            </p>
          </div>
        </div>

        <div>
          <p class="text-2xl mb-4">Line-Up</p>
          <div class="card">
            <div class="grid grid-cols-4 gap-4">

              <div class="flex space-x-4">
                <img class="rounded-full w-12 h-12 bg-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIhMDswuvJSmKllrp6VUJbwS_ID6CxQiiz950PHJRsnk2rumvPadG1_XGUCRzsAf_UvQg&usqp=CAU" alt="" srcset="">
                <div>
                  <p class="font-bold text-gray-900">Eric Church</p>
                  <p class="text-gray-500">Comedian</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="flex-1">
        <p class="text-2xl mb-4">Venue details</p>
        <div class="card">
          <div id="card-venue"></div>
          <div class="flex flex-col space-y-2 mt-8">
            <div>
              <i class="fas fa-map-marker-alt"></i>
              Garden of Eden
            </div>
            <div>
              <i class="far fa-clock"></i>
              8:00 pm
            </div>
            <div>
              <i class="fas fa-calendar-alt"></i>
              22-02-2022
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