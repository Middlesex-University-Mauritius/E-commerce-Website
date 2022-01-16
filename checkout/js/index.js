import { Storage } from "../../includes/js/scripts/storage.js";
import { CartItem } from "./view/cartItem.view.js";

const storage = new Storage("cart", {});
const items = storage.get();

const cart = document.getElementById("cart");

Object.keys(items).map((id) => {
  const title = items[id].title;
  const seats = items[id].seats;
  const subtotal = items[id].subtotal;

  const cartItem = new CartItem(title, Object.keys(seats).length, subtotal);
  cartItem.render(cart);
})