import { Venue, Section } from "../../includes/js/view/venue.view.js";
import { Storage } from "../../includes/js/scripts/storage.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

const parent = document.getElementById("reservation");

const venue = new Venue(parent);

const stage = new Section(venue, "stage", 350, 100);
const vip = new Section(venue, "vip", 600, 250);
const premium = new Section(venue, "premium", 750, 300);
const regular = new Section(venue, "regular", 850, 300);

venue.render();
venue.container.classList.add("flex-1");
venue.container.style.maxHeight = "calc(100vh - 77px)";

stage.render(venue.container, "STAGE");

vip.render(venue.container);
premium.render(venue.container);
regular.render(venue.container);

window.onload = async () => {
  const response = await axios.get("./api/bookings.php")

  let storage = new Storage("cart", {});
  const cart = storage.get();

  if (response.data) {
    vip.getAvailability(response.data);
  }

  if (cart[params.id]) {
    vip.getAvailability(Object.values(cart[params.id].seats), true);
  }
  vip.populateSeats();

  premium.populateSeats();
  regular.populateSeats();
}

const cartButton = document.getElementById("cart-button");

cartButton.addEventListener("click", () => {
  if (!params.id) return;

  let storage = new Storage("cart", {});

  const cart = storage.get();
  cart[params.id] = {
    title: "wdwdwdwdwd",
    seats: venue.getSelections(),
    subtotal: venue.getSubtotal()
  };
  
  storage.set(cart)
})