<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once "../includes/head.php";
  head();
  ?>
</head>

<body>
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <div id="banner"></div>

  <!-- Display events in extended view -->
  <div class="wrapper">
    <div id="events" class="py-10 space-y-3">
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

    // Display events in extended view 
    const SHRINKED = false;

    window.onload = async function() {
      // Test fetch from events service
      const response = await axios.get("/web/includes/controllers/eventsByCategory.controller.php");
      if (!response.data) return;

      // Render the events cards on the page
      response.data.map((row) => {
        const {
          _id: { $oid },
          title,
          description,
          date,
          time,
          image
        } = row;

        const event = new Event(SHRINKED, $oid, title, description, date, time, image);
        event.render(events);
      })
    }
  </script>
</body>

</html>