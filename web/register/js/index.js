import { validate, validateFields } from "../../includes/js/scripts/authentication.js";
import Notification from "../../includes/js/view/notification.view.js";

const email           = document.getElementById("email");
const firstName       = document.getElementById("firstName");
const lastName        = document.getElementById("lastName");
const age             = document.getElementById("age");
const phone           = document.getElementById("phone");
const password        = document.getElementById("password");
const confirmPassword = document.getElementById("confirmPassword");
const button = document.getElementById("register-btn");

const fields = {
  email,
  firstName,
  lastName,
  age,
  phone,
  password,
  confirmPassword
}

const parent = document.getElementById("body");

const notification = new Notification(parent);

validateFields(fields);

button.addEventListener("click", (event) => {
  event.preventDefault();
  if (!validate(email) || !validate(firstName) || !validate(lastName) || !validate(age) || !validate(phone) || !validate(password) || !validate(confirmPassword)) {
    return notification.render("There are some errors in your form", "error");
  }
})