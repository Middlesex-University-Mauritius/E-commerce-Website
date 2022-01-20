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

  <div id="banner"></div>

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

    window.onload = async function() {
      const response = await axios.get("/web/includes/services/events.php");
      if (!response.data) return;

      response.data.map((row) => {
        const {
          id,
          title,
          description,
          date,
          time
        } = row;

        const event = new Event(false, id, title, description, date, time);
        event.render(events);
      })
    }
  </script>
</body>

</html>