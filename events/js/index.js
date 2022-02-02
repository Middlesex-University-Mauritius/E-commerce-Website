import { Event } from "../../includes/js/view/event.view.js";

let currentTab = "live-music";

const tabs = {
  "live-music": document.getElementById("live-music"),
  "stand-up": document.getElementById("stand-up"),
  "arts-and-theater": document.getElementById("arts-and-theater"),
};

const events = document.getElementById("events");

const SHRINKED = true;

const renderEvents = async () => {
  events.innerHTML = null;

  // Simple fetch request to get all events
  const response = await axios.get(
    "../includes/controllers/eventsByCategory.controller.php",
    {
      params: {
        category: currentTab,
      },
    }
  );

  if (!response.data) return;

  if (response.data.length <= 0) return;

  // Render the events on the page in shrinked mode
  response.data.map((row) => {
    const {
      _id: { $oid },
      title,
      description,
      date,
      time,
      image,
    } = row;

    const event = new Event(
      SHRINKED,
      $oid,
      title,
      description,
      date,
      time,
      image
    );
    event.render(events);
  });
};

window.onload = async function () {
  renderEvents();
};

Object.values(tabs).forEach((tab) => {
  tab.addEventListener("click", (event) => {
    const { target } = event;

    target.className =
      "font-medium text-blue-600 bg-gray-100 active inline-block py-4 px-4 text-sm text-center rounded-t-lg white:bg-gray-800 white:text-blue-500";
    currentTab = target.id;

    renderEvents();

    Object.values(tabs).forEach((tab) => {
      if (target.id !== tab.id) {
        tab.className =
          "inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 white:text-gray-400 white:hover:bg-gray-800 white:hover:text-gray-300";
      }
    });
  });
});
