<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../styles.css">
  <script src="https://kit.fontawesome.com/f2f51db1ed.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Dashboard</title>
</head>

<body id="body">
  <div class="flex">
    <?php
    include_once "../../includes/sidebar.inc.php";
    ?>

    <div class="w-full dashboard-content">

      <p class="text-3xl px-10 py-6 border-b w-full bg-white">
        <?php echo ucfirst(basename($_SERVER['PHP_SELF'], ".php")) ?>
      </p>

      <div class="flex-1 py-6 px-10">

        <div class="card p-0">
          <div class="relative p-5 border-b bg-gray-50">
            <input type="text" placeholder="Search customer to display event recommendations" />
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-0 right-10 h-[5.5rem] text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>

          <div class="p-5">
            <p class="text-xl mb-4">John's recommendations</p>

            <div id="recommended-events" class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script type="module">
    import {
      Event
    } from "/web/includes/js/view/event.view.js"
    const events = document.getElementById("recommended-events");

    window.onload = async function() {
      const response = await axios.get("../../../includes/services/events.php");
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