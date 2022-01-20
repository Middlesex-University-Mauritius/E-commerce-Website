import { validateFields, validate } from "../../includes/js/scripts/authentication.js";
import Notification from "../../includes/js/view/notification.view.js"

const email    = document.getElementById("email");
const password = document.getElementById("password");
const button = document.getElementById("login-btn");

const fields = {
  email,
  password
}

const parent = document.getElementById("body");

const notification = new Notification(parent);

// Validate the fields
validateFields(fields);

// Show errors when login fails
button.addEventListener("click", (event) => {
  event.preventDefault();
  if (!validate(email) || !validate(password)) {
    return notification.render("There are some errors in your form", "error");
  }
})