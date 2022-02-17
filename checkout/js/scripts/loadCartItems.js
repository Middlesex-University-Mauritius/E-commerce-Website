"use strict";

/**
 * description: Load the cart items
 */

import {
  eventsCount,
  formatNumber,
  ticketsCount,
} from "../../../includes/js/scripts/core.js";
import { Storage } from "../../../includes/js/scripts/storage.js";
import { CartItem } from "../view/cartItem.view.js";

// Load cart items
export const loadCartItems = () => {
  const cartCount = document.getElementById("checkout-count");
  const totalElement = document.getElementById("total");
  const subtotalElement = document.getElementById("subtotal");
  const cart = document.getElementById("cart");
  const placeOrder = document.getElementById("place-order");
  // Clear previous cart items
  cart.innerHTML = null;

  const storage = new Storage("cart", {});
  const items = storage.get();

  // Show empty message when cart is empty
  if (Object.keys(items).length == 0) {
    const emptyMessage = document.createElement("p");
    emptyMessage.innerText = "Your cart is empty";
    emptyMessage.className = "text-gray-600 fade";
    cart.append(emptyMessage);
    placeOrder.disabled = true;
  }

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

    const cartItem = new CartItem(
      id,
      title,
      Object.keys(seats).length,
      subtotal
    );
    cartItem.render(cart);
  });

  subtotalElement.innerText = formatNumber(total);
  totalElement.innerText = formatNumber(total + 0.15 * total);
};
