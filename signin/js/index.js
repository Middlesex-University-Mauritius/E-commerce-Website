"use strict";

import {
  validateFieldsWithInput,
  validateFieldsWithoutInput,
} from "../../includes/js/scripts/form.js";
import Notification from "../../includes/js/view/notification.view.js";
import { Error } from "../../includes/js/view/error.view.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

const email = document.getElementById("email");
const password = document.getElementById("password");
const button = document.getElementById("login-btn");
const errorContainer = document.getElementById("errors");

const fields = {
  email,
  password,
};

const parent = document.getElementById("body");

const notification = new Notification(parent);

// Validate the fields
validateFieldsWithInput(fields);

// Show errors when login fails
button.addEventListener("click", (event) => {
  errorContainer.innerHTML = null;
  const errorMessage = new Error();
  event.preventDefault();

  const { hasErrors } = validateFieldsWithoutInput(fields);

  if (!hasErrors) {
    axios
      .post("/web/includes/controllers/signin.controller.php", {
        email: email.value.toLowerCase(),
        password: password.value,
      })
      .then((response) => {
        const { data } = response;

        if (!data.success) {
          errorMessage.render(errorContainer, data.message);
        } else {
          notification.render(
            `Authenticated as ${email.value.toLowerCase()}`,
            "success"
          );

          setTimeout(() => {
            if (params.redirect) {
              window.location.href = params.redirect;
            } else {
              window.location.href = "/web/home";
            }
          }, 1000);
        }

        button.disabled = false;
      })
      .catch((error) => {
        errorMessage.render(errorContainer, data.message);
      });
  }
});
