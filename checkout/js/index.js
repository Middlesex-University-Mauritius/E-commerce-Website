import { Storage } from "../../includes/js/scripts/storage.js";
import { Loader } from "../../includes/js/view/loader.view.js";
import Message from "../../includes/js/view/message.view.js";
import { resetField } from "../../includes/js/scripts/resetField.js";
import { loadCartItems } from "./scripts/loadCartItems.js";
import Notification from "../../includes/js/view/notification.view.js";

// Initialize local storage using storage helper class
const storage = new Storage("cart", {});
const items = storage.get();
const placeOrder = document.getElementById("place-order");

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

loadCartItems();

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
        // Unauthorized
        if (error.response.status === 401) {
          const parent = document.getElementById("body")
          const notification = new Notification(parent);
          notification.render("You need to login to continue");
          setTimeout(() => {
            window.location.href = "/web/signin?redirect=/web/checkout"
            loader.unset();
            placeOrder.disabled = false;
          }, 1200)
        } else {
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