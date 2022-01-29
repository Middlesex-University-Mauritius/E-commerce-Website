import { Storage } from "../../includes/js/scripts/storage.js";
import { CartItem } from "./view/cartItem.view.js";
import { Loader } from "../../includes/js/view/loader.view.js";

// Initialize local storage using storage helper class
const storage = new Storage("cart", {});
const items = storage.get();
const cartCount = document.getElementById("checkout-count");
const placeOrder = document.getElementById("place-order");
const totalElement = document.getElementById("total");
const subtotalElement = document.getElementById("subtotal");

const cart = document.getElementById("cart");

// Show empty message when cart is empty
if (Object.keys(items).length == 0) {
  const emptyMessage = document.createElement("p");
  emptyMessage.innerText = "Your cart is empty";
  emptyMessage.className = "text-gray-600";
  cart.append(emptyMessage);
} else {
  // Update cart count when there are items in cart
  cartCount.innerText = `(${Object.keys(items).length})`

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
  totalElement.innerText = total + (0.15 * total);
}

placeOrder.addEventListener("click", () => {
  const parent = document.getElementById("place-order-loader");

  const loader = new Loader(parent);

  loader.set();
  placeOrder.disabled = true;

  Object.keys(items).map((eventId) => {
    const { event_id, seats, subtotal, title } = items[eventId];
    axios.post("../includes/services/addBooking.php", {
      eventId,
      seats,
      subtotal
    }).then((response) => {
      const { data } = response;
      console.log(data);
      loader.unset();
      placeOrder.disabled = false;
    }).catch((error) => {
      if (error) {
        loader.unset();
        placeOrder.disabled = false;
      }
    }) 
  })
})