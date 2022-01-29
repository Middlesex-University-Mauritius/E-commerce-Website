import { validate, validateFields } from "../../includes/js/scripts/authentication.js";
import Notification from "../../includes/js/view/notification.view.js";
import { Storage } from "../../includes/js/scripts/storage.js";

// Get fields from form
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

// Initialize notification
const notification = new Notification(parent);

// Validate the fields
validateFields(fields);

// Handle click on register
button.addEventListener("click", (event) => {
  event.preventDefault();
  button.disabled = true;
  if (!validate(email) || !validate(firstName) || !validate(lastName) || !validate(age) || !validate(phone) || !validate(password) || !validate(confirmPassword)) {
    // Show notifications if there are any errors
    return notification.render("There are some errors in your form", "error");
  } else {
    axios.post("/web/includes/services/register.php", {
      email: email.value,
      firstName: firstName.value,
      lastName: lastName.value,
      age: age.value,
      phone: phone.value,
      password: password.value,
      confirmPassword: confirmPassword.value,
    }).then((response) => {
      const storage = new Storage("user", {})

      const { data } = response;

      if (data.success) {
        console.log(data);
        notification.render("Account successfully created!", "success");
        storage.set(data.user);

        // setTimeout(() => {
        //   window.location.href = "/"
        // }, 1000)
      }
    })
  }
})