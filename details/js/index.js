import { Section, Venue } from "../../includes/js/view/venue.view.js";
import { showSlides } from "../../includes/js/scripts/slide.js";
import { getCookie, setCookie } from "../../includes/js/scripts/cookie.js";
import { setRecentlyVisited } from "../../includes/js/scripts/recommendation.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

const RATIO = 2;
const DISABLED = true;

const parent = document.getElementById("card-venue");
const title = document.getElementById("title");
const description = document.getElementById("description");
const time = document.getElementById("time");
const date = document.getElementById("date");
const link = document.getElementById("link");
const slideshowContainer = document.getElementById("slideshow-container");

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
    "/web/includes/controllers/event-by-id.controller.php",
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

  setRecentlyVisited(event._id.$oid)

  const images = event.images;

  images.forEach((slide) => {
    const imageContainer = document.createElement("div");
    imageContainer.className = "slides fade";
    const img = document.createElement("img");
    img.src = slide;
    img.className = "w-full none h-96 object-cover";
    imageContainer.append(img);
    slideshowContainer.append(imageContainer);
  });
  showSlides();

  title.innerText = event.title;
  description.innerText = event.description;
  date.innerText = event.date;
  time.innerText = event.time;
  link.href = `/web/reservation/?id=${event._id.$oid}`;
};
