import { Section, Venue } from "../../includes/js/view/venue.view.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

const RATIO = 2;
const DISABLED = true;

const parent = document.getElementById("card-venue");
const title = document.getElementById("title");
const description = document.getElementById("description");
const time = document.getElementById("time");
const date = document.getElementById("date");

const prices = {
  vip: 0,
  regular: 0,
  premium: 0,
};

// Reduce the size of the preview venue by 2 using ratio parameter and disabling mouse events
const venue = new Venue(parent, prices, RATIO, DISABLED);

// Show stage, vip, premium and regular
const stage = new Section(venue, "stage", 350, 100);
const vip = new Section(venue, "vip", 600, 250);
const premium = new Section(venue, "premium", 750, 300);
const regular = new Section(venue, "regular", 850, 300);

venue.render();

stage.render(venue.container, "STAGE");

vip.render(venue.container);
premium.render(venue.container);
regular.render(venue.container);

// Populate sections with seats
vip.populateSeats();
premium.populateSeats();
regular.populateSeats();

window.onload = async () => {
  if (!params.id) {
    window.location.href = "/web/home/";
  }

  const response = await axios.get(
    "/web/includes/controllers/eventById.controller.php",
    {
      params: {
        id: params.id,
      },
    }
  );

  const { data } = response;

  if (!data) {
    window.location.href = "/web/home/";
  }

  const event = data[0];

  title.innerText = event.title;
  description.innerText = event.description;
  date.innerText = event.date;
  time.innerText = event.time;
};
