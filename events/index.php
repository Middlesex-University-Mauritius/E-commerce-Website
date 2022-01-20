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

    <!-- Display events in shrinked mode -->
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

    const SHRINKED = true;

    window.onload = async function() {
      // Simple fetch request to get all events
      const response = await axios.get("../includes/services/events.php");
      if (!response.data) return;

      // Render the events on the page in shrinked mode
      response.data.map((row) => {
        const {
          id,
          title,
          description,
          date,
          time
        } = row;

        const event = new Event(SHRINKED, id, title, description, date, time);
        event.render(events);
      })
    }
  </script>
</body>

</html>