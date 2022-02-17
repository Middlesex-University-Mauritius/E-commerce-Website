"use strict";

/**
 * description: Handle checkout
 */

import { Storage } from "../../includes/js/scripts/storage.js";
import { Loader } from "../../includes/js/view/loader.view.js";
import Message from "../../includes/js/view/message.view.js";
import { resetField } from "../../includes/js/scripts/form.js";
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

// Modal
const modal = document.getElementById("defaultModal");

let errors = false;

// State to store customer information
const customerInformationFields = {
  streetAddress,
  district,
  zipCode,
  houseNumber,
};

// State to store address
const address = {
  streetAddress: null,
  district: null,
  zipCode: null,
  houseNumber: null,
};

// Load cart items
loadCartItems();

// Place order function
placeOrder.addEventListener("click", () => {
  // Customer details must not be left empty
  Object.values(customerInformationFields).forEach((field) => {
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
    const { seats, subtotal } = items[eventId];

    // Create the booking
    axios
      .post("../includes/controllers/add-booking.controller.php", {
        eventId,
        seats,
        total: subtotal + 0.15 * subtotal,
        address,
      })
      .then((response) => {
        // Show loading spinner
        const { data } = response;
        loader.unset();
        placeOrder.disabled = false;
        storage.delete();

        // Redirect
        if (data.success && data.booking_id) {
          window.location.href = `/web/messages/checkout.php?id=${data.booking_id}`;
        } else {
          window.location.href = "/web/home";
        }
      })
      .catch((error) => {
        // Unauthorized
        if (error.response.status === 401) {
          const parent = document.getElementById("body");
          const notification = new Notification(parent);
          notification.render("You need to login to continue");

          // Requires login
          setTimeout(() => {
            window.location.href = "/web/signin?redirect=/web/checkout";
            loader.unset();
            placeOrder.disabled = false;
          }, 1200);
        } else {
          loader.unset();
          placeOrder.disabled = false;
        }
      });
  });
});

// Remove field errors
Object.values(customerInformationFields).forEach((field) => {
  field.addEventListener("input", (event) => {
    resetField(event.target);
    errors = false;
    address[event.target.id] = event.target.value;
  });
});

// Remove cart item
const deleteButton = document.getElementById("delete");
deleteButton.addEventListener("click", () => {
  const id = window.itemToDelete;
  if (!id) return;
  const storage = new Storage("cart", {});
  let items = storage.get();
  delete items[id];
  storage.set(items);
  loadCartItems();

  // Must reload to re render delete modal
  window.location.reload();
});
