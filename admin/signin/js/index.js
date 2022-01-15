import { validateFields, validate } from "../../../includes/js/scripts/authentication.js";
import Notification from "../../../includes/js/view/notification.view.js"

const username    = document.getElementById("username");
const password = document.getElementById("password");
const button = document.getElementById("login-btn");

const fields = {
  username,
  password
}

const parent = document.getElementById("body");

const notification = new Notification(parent);

validateFields(fields);

// button.addEventListener("click", (event) => {
//   event.preventDefault();
//   if (!validate(username) || !validate(password)) {
//     return notification.render("There are some errors in your form", "error");
//   }
// })