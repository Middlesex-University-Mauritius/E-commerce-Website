import {
  validateFieldsWithInput,
  validateFieldsWithoutInput,
} from "../../includes/js/scripts/form.js";
import Notification from "../../includes/js/view/notification.view.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

const email = document.getElementById("email");
const password = document.getElementById("password");
const button = document.getElementById("login-btn");
const errors = document.getElementById("errors");

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
  errors.innerHTML = null;
  event.preventDefault();

  const { hasErrors } = validateFieldsWithoutInput(fields);

  if (!hasErrors) {
    axios
      .post("/web/includes/controllers/signin.controller.php", {
        email: email.value,
        password: password.value,
      })
      .then((response) => {
        const { data } = response;

        if (!data.authenticated) {
          const errorList = document.createElement("ul");
          errorList.className = "error-list";
          const error = document.createElement("li");
          error.innerText = data.message;
          errorList.append(error);

          errors.append(errorList);
        } else {
          notification.render(`Authenticated as ${data.email}`, "success");

          setTimeout(() => {
            if (params.redirect) {
              window.location.href = params.redirect;
            } else {
              window.location.href = "/web/home";
            }
          }, 1000);
        }

        button.disabled = false;
      });
  }
});
