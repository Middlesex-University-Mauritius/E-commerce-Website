import { ticketsCount } from "./core.js";

export const updateCart = () => {
  // Get all items in cart
  const cartCount = document.getElementById("cart-count");

  // Render the number of items in cart in navbar
  cartCount.innerText = ticketsCount();
}

updateCart()