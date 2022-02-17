import { Event } from "../../includes/js/view/event.view.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

let currentTab = params.start || "live-music";

const tabs = {
  "live-music": document.getElementById("live-music"),
  "stand-up": document.getElementById("stand-up"),
  "arts-and-theater": document.getElementById("arts-and-theater"),
};

const states = {
  active:
    "font-medium text-blue-600 bg-gray-100 active inline-block py-4 px-4 text-sm text-center rounded-t-lg white:bg-gray-800 white:text-blue-500",
  disabled:
    "inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 white:text-gray-400 white:hover:bg-gray-800 white:hover:text-gray-300",
};

if (params.start) {
  try {
    tabs[params.start].className = states.active;
    Object.values(tabs).forEach((tab) => {
      if (params.start !== tab.id) {
        tab.className = states.disabled;
      }
    });
  } catch (e) {}
}

const events = document.getElementById("events");

const SHRINKED = true;

const renderEvents = async () => {
  events.innerHTML = null;

  // Simple fetch request to get all events
  const response = await axios.get(
    "/web/includes/controllers/events-by-category.controller.php",
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
      images,
      datePosted,
      prices,
      promoted,
    } = row;

    const event = new Event(
      SHRINKED,
      $oid,
      title,
      description,
      date,
      time,
      images,
      datePosted,
      prices,
      promoted
    );
    event.render(events);
  });
};

// Render events
window.onload = async function () {
  renderEvents();
};

// Render tabs
Object.values(tabs).forEach((tab) => {
  tab.addEventListener("click", (event) => {
    const { target } = event;

    target.className = states.active;
    currentTab = target.id;

    renderEvents();

    Object.values(tabs).forEach((tab) => {
      if (target.id !== tab.id) {
        tab.className = states.disabled;
      }
    });
  });
});
