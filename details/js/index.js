import { Section, Venue } from "../../includes/js/view/venue.view.js";
import { showSlides } from "../../includes/js/scripts/slide.js";
import { setRecentlyVisited } from "../../includes/js/scripts/recommendation/tracker.js";
import { formatNumber } from "../../includes/js/scripts/core.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

const RATIO = 2;
const DISABLED = true;
const compareWithCurrentUser = false

const parent = document.getElementById("card-venue");
const title = document.getElementById("title");
const description = document.getElementById("description");
const time = document.getElementById("time");
const date = document.getElementById("date");
const link = document.getElementById("link");
const slideshowContainer = document.getElementById("slideshow-container");

const regularPrice = document.getElementById("regular-price");
const premiumPrice = document.getElementById("premium-price");
const vipPrice = document.getElementById("vip-price");

const prices = {
  vip: 0,
  regular: 0,
  premium: 0,
};

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

  regularPrice.innerText = formatNumber(event.prices.regular);
  premiumPrice.innerText = formatNumber(event.prices.premium);
  vipPrice.innerText = formatNumber(event.prices.vip);

  document.querySelector("#current").innerText = event.title

  // Reduce the size of the preview venue by 2 using ratio parameter and disabling mouse events
  const venue = new Venue(parent, prices, compareWithCurrentUser, RATIO, DISABLED);

  // Show stage, vip, premium and regular
  const stage = new Section(venue, "stage", 350, 100);
  const vip = new Section(venue, "vip", 600, 250);
  const premium = new Section(venue, "premium", 750, 300);
  const regular = new Section(venue, "regular", 850, 300);

  let seats = [];

  data.map((d) => {
    if (Object.keys(d.bookings).length === 0) return;

    Object.values(d.bookings.seats).map((seat) =>
      seats.push({ ...seat, customer: d.bookings.customer })
    );
  });

  venue.getAvailability(seats);

  venue.render();

  stage.render(venue.container, "STAGE");

  vip.render(venue.container);
  premium.render(venue.container);
  regular.render(venue.container);

  // Populate sections with seats
  vip.populateSeats();
  premium.populateSeats();
  regular.populateSeats();

  setRecentlyVisited(event._id.$oid)

  const images = event.images;

  images.forEach((slide) => {
    const imageContainer = document.createElement("div");
    imageContainer.className = "slides fade";
    const img = document.createElement("img");
    img.src = `/web/__images__/${event._id.$oid}/${slide}`;
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
