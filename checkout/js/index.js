import { Storage } from "../../includes/js/scripts/storage.js";
import { CartItem } from "./view/cartItem.view.js";
import { Loader } from "../../includes/js/view/loader.view.js";
import Message from "../../includes/js/view/message.view.js";
import { resetField } from "../../includes/js/scripts/resetField.js";
import { eventsCount, ticketsCount } from "../../includes/js/scripts/core.js";

// Initialize local storage using storage helper class
const storage = new Storage("cart", {});
const items = storage.get();
const cartCount = document.getElementById("checkout-count");
const placeOrder = document.getElementById("place-order");
const totalElement = document.getElementById("total");
const subtotalElement = document.getElementById("subtotal");

const streetAddress = document.getElementById("streetAddress");
const district = document.getElementById("district");
const zipCode = document.getElementById("zipCode");
const houseNumber = document.getElementById("houseNumber");

let errors = false;

const customerInformation = {
  streetAddress,
  district,
  zipCode,
  houseNumber,
};

const address = {
  streetAddress: null,
  district: null,
  zipCode: null,
  houseNumber: null,
};

const cart = document.getElementById("cart");

// Show empty message when cart is empty
if (Object.keys(items).length == 0) {
  const emptyMessage = document.createElement("p");
  emptyMessage.innerText = "Your cart is empty";
  emptyMessage.className = "text-gray-600";
  cart.append(emptyMessage);
  placeOrder.disabled = true;
} else {
  // Update cart count when there are items in cart
  const counts = {
    tickets: ticketsCount(),
    events: eventsCount(),
  };

  cartCount.innerText = `(${counts.events} ${
    counts.events === 1 ? "event" : "events"
  },  ${counts.tickets} ${counts.tickets === 1 ? "ticket" : "tickets"})`;

  let total = 0;

  // Render the cart items
  Object.keys(items).map((id) => {
    const title = items[id].title;
    const seats = items[id].seats;
    const subtotal = items[id].subtotal;
    total += subtotal;

    const cartItem = new CartItem(title, Object.keys(seats).length, subtotal);
    cartItem.render(cart);
  });

  subtotalElement.innerText = total;
  totalElement.innerText = total + 0.15 * total;
}

placeOrder.addEventListener("click", () => {
  Object.values(customerInformation).forEach((field) => {
    if (field.value <= 0) {
      errors = true;

      field.classList.add("error");
      const message = "This field cannot be empty";

      const messageView = new Message(message);

      const parent = field.parentNode;

      if (parent.lastElementChild.className !== "error")
        messageView.render(parent, "error");
    } else {
      errors = false;
    }
  });

  if (errors) return;

  const parent = document.getElementById("place-order-loader");

  const loader = new Loader(parent);

  loader.set();
  placeOrder.disabled = true;

  Object.keys(items).map((eventId) => {
    const { event_id, seats, subtotal, title } = items[eventId];
    axios
      .post("../includes/controllers/add-booking.controller.php", {
        eventId,
        seats,
        subtotal,
        address,
      })
      .then((response) => {
        const { data } = response;
        console.log(data);
        loader.unset();
        placeOrder.disabled = false;
        storage.delete();

        if (data.success && data.booking_id) {
          window.location.href = `/web/messages/checkout.php?id=${data.booking_id}`;
        } else {
          window.location.href = "/web/home";
        }
      })
      .catch((error) => {
        if (error) {
          loader.unset();
          placeOrder.disabled = false;
        }
      });
  });
});

Object.values(customerInformation).forEach((field) => {
  field.addEventListener("input", (event) => {
    resetField(event.target);
    errors = false;
    address[event.target.id] = event.target.value;
  });
});
