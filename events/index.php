<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/f2f51db1ed.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="../styles.css">

  <title>Document</title>
</head>

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
      const response = await axios.get("events.php");
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