<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/f2f51db1ed.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="styles.css">

  <title>Document</title>
</head>

<body class="mx-56">
  <div id="events" class="py-10 space-y-3">
  </div>

  <script type="module">
    import {
      Event
    } from "./includes/js/view/event.view.js"
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

        console.log(id, title)

        // console.log(id, title, description, date, time)
        const event = new Event(id, title, description, date, time);
        event.render(events);
      })
    }
  </script>
</body>

</html>