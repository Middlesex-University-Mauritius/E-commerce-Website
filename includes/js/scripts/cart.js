import { Storage } from "./storage.js";

// Get all items in cart
const cartCount = document.getElementById("cart-count");
const cart = new Storage("cart", {}).get();

// Render the number of items in cart in navbar
cartCount.innerText = Object.keys(cart).length;
