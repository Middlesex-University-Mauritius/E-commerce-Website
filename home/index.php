<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once "../includes/head.php";
  head();
  ?>
  <script type="module" src="/web/includes/js/scripts/scroll.js"></script>
</head>

<body>
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <!-- Banner -->
  <div id="banner" class="block py-40 lg:py-56 ">
    <div class="w-[700px] mx-auto">
      <p class="text-5xl text-white font-semibold text-left">The best place to grab event tickets.</p>

      <form id="search-box" class="search-box mx-auto mt-5">
        <input id="search-input" class="search-text" type="text" placeholder="Search for event">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form> 

      <div class="flex space-x-2 my-4">
        <a href="/web/events/?start=live-music" class="tag cursor-pointer">#Live Music</a>
        <a href="/web/events/?start=stand-up" class="tag cursor-pointer">#Stand up</a>
        <a href="/web/events/?start=arts-and-theater" class="tag cursor-pointer">#Arts & Theater</a>
      </div>
    </div>
  </div>

  <!-- Display events in extended view -->
  <div class="wrapper">
    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mt-8">Booking an event</h5>

    <div class="grid grid-cols-3 gap-4 mb-10">
      <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">1. Search for an event</h5>
        <p class="mb-3 font-normal text-gray-700">To get started, search for an event that you are interested in</p>
        <a href="/web/events" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
          See events
          <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
      </div>

      <div class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">2. Reserve tickets</h5>
        <p class="font-normal text-gray-700">Use our reservation page to reserve your tickets. We have 3 categories of seats: regular, premium, and VIP.</p>
      </div>

      <div class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">3. Checkout</h5>
        <p class="font-normal text-gray-700">Review your orders, fill the required information and click on place order.</p>
      </div>
    </div>

    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mt-8">Promoted Events</h5>
    <div id="events" class="space-y-3">
    </div>

    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mt-8">Recently Visited</h5>
    <div id="recently-visited" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"></div>

    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mt-8">Recommended based on your searches</h5>
    <div id="search-term" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"></div>
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
      const response = await axios.get("/web/includes/controllers/get-promoted-events.controller.php");
      if (!response.data) return;

      // Render the events cards on the page
      response.data.map((row) => {
        const {
          _id: { $oid },
          title,
          description,
          date,
          time,
          images,
          datePosted,
          prices,
          promoted
        } = row;

        const event = new Event(SHRINKED, $oid, title, description, date, time, images, datePosted, prices, promoted);
        event.render(events);
      })
    }
  </script>

  <!-- Home page banner search bar -->
  <script>
    const bannerSearch = document.getElementById("search-box");
    const bannerInput = document.getElementById("search-input");

    bannerSearch.addEventListener("submit", (event) => {
      event.preventDefault();
      window.location.href = `/web/search?query=${bannerInput.value}`;
    });
  </script>

  <!-- Frequently Visited Module -->
  <script type="module" src="../includes/js/scripts/recommendation/frequentlyVisited.js"></script>

  <!-- Search Term Results Module -->
  <script type="module" src="../includes/js/scripts/recommendation/searchTerm.js"></script>
</body>

</html>