import { Storage } from "../../includes/js/scripts/storage.js";
import { CartItem } from "./view/cartItem.view.js";

const storage = new Storage("cart", {});
const items = storage.get();
const cartCount = document.getElementById("checkout-count");

const cart = document.getElementById("cart");

if (Object.keys(items).length == 0) {
  const emptyMessage = document.createElement("p");
  emptyMessage.innerText = "Your cart is empty";
  emptyMessage.className = "text-gray-600";
  cart.append(emptyMessage);
} else {
  cartCount.innerText = `(${Object.keys(items).length})`

  Object.keys(items).map((id) => {
    const title = items[id].title;
    const seats = items[id].seats;
    const subtotal = items[id].subtotal;

    const cartItem = new CartItem(title, Object.keys(seats).length, subtotal);
    cartItem.render(cart);
  });
}
