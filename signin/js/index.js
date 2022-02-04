import {
  validateFields,
  validate,
} from "../../includes/js/scripts/authentication.js";
import Notification from "../../includes/js/view/notification.view.js";
import { Storage } from "../../includes/js/scripts/storage.js";

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
validateFields(fields);

// Show errors when login fails
button.addEventListener("click", (event) => {
  errors.innerHTML = null;
  event.preventDefault();
  button.disabled = true;
  if (!validate(email) || !validate(password)) {
    return notification.render("There are some errors in your form", "error");
  } else {
    axios
      .post("/web/includes/controllers/signin.controller.php", {
        email: email.value,
        password: password.value,
      })
      .then((response) => {
        const storage = new Storage("user", {});

        const { data } = response;

        if (!data.authenticated) {
          const errorList = document.createElement("ul");
          errorList.className = "error-list";
          const error = document.createElement("li");
          error.innerText = data.message;
          errorList.append(error);

          errors.append(errorList);
        } else {
          storage.set(data.user);
          notification.render(`Authenticated as ${data.email}`, "success");

          setTimeout(() => {
            window.location.href = "/web/home";
          }, 1000);
        }

        button.disabled = false;
      });
  }
});
