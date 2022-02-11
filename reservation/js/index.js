import { Venue, Section } from "../../includes/js/view/venue.view.js";
import { Storage } from "../../includes/js/scripts/storage.js";
import { updateCart } from "../../includes/js/scripts/cart.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

const parent = document.getElementById("reservation");
const keysTitle = document.getElementById("keys-title");
const keysContent = document.getElementById("keys-content");

let currentEvent = null;
let venue = null;

window.onload = async () => {
  const response = await axios.get(
    "../includes/controllers/event-by-id.controller.php",
    {
      params: { id: params.id },
    }
  );

  const { data } = response;

  currentEvent = data.length <= 0 ? null : data[0];

  if (!currentEvent) return;

  venue = new Venue(parent, currentEvent.prices);

  let seats = [];

  data.map((d) => {
    if (Object.keys(d.bookings).length === 0) return;

    Object.values(d.bookings.seats).map((seat) =>
      seats.push({ ...seat, customer: d.bookings.customer })
    );
  });

  venue.getAvailability(seats);

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

  let storage = new Storage("cart", {});
  const cart = storage.get();

  if (cart[params.id]) {
    venue.getAvailability(Object.values(cart[params.id].seats), true);
  }

  if (Object.keys(cart).length >= 1 && Object.keys(cart[params.id]).length >= 1) {
    cartButton.disabled = false;
  }

  vip.populateSeats();
  premium.populateSeats();
  regular.populateSeats();
};

const cartButton = document.getElementById("cart-button");

let storage = new Storage("cart", {});
const cart = storage.get();

const addToCart = () => {
  if (!params.id || !venue || !currentEvent) return;

  if (venue.getSelections()) {
    // Item exists in cart already
    if (cart[params.id] && Object.keys(venue.getSelections()).length <= 0) {
      // Delete if seats have been deleted
      delete cart[params.id];
    } else {
      // Add to cart new selection
      cart[params.id] = {
        event_id: currentEvent._id.$oid,
        title: currentEvent.title,
        seats: venue.getSelections(),
        subtotal: venue.getSubtotal(),
      };
    }
  }

  storage.set(cart);

  // Update cart count
  updateCart()
};

cartButton.addEventListener("click", () => {
  addToCart()
  if (venue.updating) {
    venue.setUpdating(false);
  } else {
    window.location.href = "/web/checkout/"
  }
});

keysTitle.addEventListener("click", () => {
  const hidden = keysContent.hidden;
  keysContent.hidden = !hidden;
})