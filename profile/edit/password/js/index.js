import {
  setError,
  validateFieldsWithInput,
  validateFieldsWithoutInput,
} from "../../../../includes/js/scripts/form.js";
import Notification from "../../../../includes/js/view/notification.view.js";

const notification = new Notification(document.querySelector("#body"));

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

// Set current tab active
if (params.active === "password") {
  document.querySelector("#edit-password").className =
    "text-blue-700 bg-gray-100 inline-flex relative items-center py-2 px-4 w-full text-sm font-medium rounded-t-lg border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700";
}

// Change password button
const changePasswordButton = document.getElementById("change-password-button");

// Profile name
const profileName = document.getElementById("profile-name");

let user = {};

// Load customer details on page load
window.onload = async () => {
  const api = "/web/includes/controllers/get-profile.controller.php";
  const response = await axios.get(api);
  const { data } = response;

  profileName.innerText = `${data.user.firstName} ${data.user.lastName}`;

  if (data.success) {
    user = data.user;
  }
};

// Fields
const oldPassword = document.getElementById("oldPassword");
const newPassword = document.getElementById("password");
const confirmNewPassword = document.getElementById("confirmPassword");

const fields = {
  oldPassword,
  newPassword,
  confirmNewPassword,
};

// Validate the fields on input
validateFieldsWithInput(fields);

// Change password
changePasswordButton.addEventListener("click", async () => {
  // User object empty
  if (!user || user === {}) return;

  let { hasErrors, errors } = validateFieldsWithoutInput(fields);

  // Check old password
  if (oldPassword.value !== user.password) {
    setError(oldPassword, "Old password isn't valid");
    errors["oldPassword"] = true;
  }

  // Change password
  if (!hasErrors) {
    const response = await axios.post(
      "/web/includes/controllers/update-password.controller.php",
      {
        newPassword: newPassword.value,
      }
    );

    // Password same. There is no need to make unnecessary AJAX requests
    if (newPassword.value === oldPassword.value) {
      return setTimeout(() => {
        notification.render("Password changed successfully", "success");
      }, 500);
    }

    // Something went wrong
    if (!response.data)
      notification.render("Something went wrong when updating your password");

    // Show notification
    notification.render(
      response.data.message,
      response.data.success ? "success" : "error"
    );
  }
});
