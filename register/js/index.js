"use strict"

import {
  validateFieldsWithInput,
  validateFieldsWithoutInput,
} from "../../includes/js/scripts/form.js";
import Notification from "../../includes/js/view/notification.view.js";
import { Error } from "../../includes/js/view/error.view.js";

// Get fields from form
const email = document.getElementById("email");
const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const age = document.getElementById("age");
const phone = document.getElementById("phone");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirmPassword");
const button = document.getElementById("register-btn");

// Error container
const errorContainer = document.querySelector("#errors");

const fields = {
  email,
  firstName,
  lastName,
  age,
  phone,
  password,
  confirmPassword,
};

const parent = document.getElementById("body");

// Initialize notification
const notification = new Notification(parent);

// Validate the fields
validateFieldsWithInput(fields);

// Handle click on register
button.addEventListener("click", (event) => {
  event.preventDefault();
  const errorMessage = new Error();
  errorContainer.innerHTML = null;

  const { hasErrors } = validateFieldsWithoutInput(fields);

  // No errors
  if (!hasErrors) {
    button.disabled = true;
    axios
      .post("/web/includes/controllers/register.controller.php", {
        email: email.value.toLowerCase(),
        firstName: firstName.value,
        lastName: lastName.value,
        age: age.value,
        phone: String(phone.value),
        password: password.value,
        confirmPassword: confirmPassword.value,
      })
      .then((response) => {
        const { data } = response;

        if (!data.success) {
          errorMessage.render(errorContainer, data.message)
        } else {
          notification.render("Account successfully created!", "success");
          setTimeout(() => {
            window.location.href = "/web/home";
            button.disabled = false;
          }, 1000);
        }
      }).catch((error) => {
        console.log(error)
        errorMessage.render(errorContainer, data.message)
        if (error) {
          button.disabled = false;
        }
      });
  }
});
