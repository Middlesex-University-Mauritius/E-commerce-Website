import { Storage } from "../../includes/js/scripts/storage.js";

window.onload = function () {
  const cart = new Storage("cart", {});
  const user = new Storage("user", {});
  cart.delete();
  user.delete();
  window.location.href = "/web/home";
};
