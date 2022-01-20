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

    <div id="events" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    </div>
  </div>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <script type="module">
    import {
      Event
    } from "../includes/js/view/event.view.js"
    const events = document.getElementById("events");

    window.onload = async function() {
      const response = await axios.get("../includes/services/events.php");
      if (!response.data) return;

      response.data.map((row) => {
        const {
          id,
          title,
          description,
          date,
          time
        } = row;

        const event = new Event(true, id, title, description, date, time);
        event.render(events);
      })
    }
  </script>
</body>

</html>