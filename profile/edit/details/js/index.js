"use strict";

import {
  validateFieldsWithInput,
  validateFieldsWithoutInput,
} from "../../../../includes/js/scripts/form.js";
import Notification from "../../../../includes/js/view/notification.view.js";

const notification = new Notification(document.querySelector("#body"));

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

if (params.active === "details") {
  document.querySelector("#edit-details").className =
    "text-blue-700 bg-gray-100 inline-flex relative items-center py-2 px-4 w-full text-sm font-medium rounded-t-lg border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700";
}

// Profile name
const profileName = document.getElementById("profile-name");

// Fields
const email = document.getElementById("email");
const firstName = document.getElementById("first-name");
const lastName = document.getElementById("last-name");
const age = document.getElementById("age");
const phone = document.getElementById("phone");

const fields = {
  email,
  firstName,
  lastName,
  age,
  phone,
};

// Validate the fields on input
validateFieldsWithInput(fields);

// Loaded customer details
let customerDetails = {};

window.onload = async () => {
  const api = "/web/includes/controllers/get-profile.controller.php";
  const response = await axios.get(api);
  const { success, user } = response.data;

  profileName.innerText = `${user.firstName} ${user.lastName}`;

  customerDetails = {
    email: user.email,
    firstName: user.firstName,
    lastName: user.lastName,
    age: user.age,
    phone: user.phone,
  };

  if (success) {
    email.value = user.email;
    firstName.value = user.firstName;
    lastName.value = user.lastName;
    age.value = user.age;
    phone.value = user.phone;
  }
};

// Update profile button
const updateProfileButton = document.getElementById("update-profile-button");

updateProfileButton.addEventListener("click", async () => {
  const { hasErrors } = validateFieldsWithoutInput(fields);

  // No errors
  if (!hasErrors) {
    const newDetails = {
      email: email.value,
      firstName: firstName.value,
      lastName: lastName.value,
      age: age.value,
      phone: phone.value,
    };

    if (
      newDetails.email == customerDetails.email &&
      newDetails.firstName == customerDetails.firstName &&
      newDetails.lastName == customerDetails.lastName &&
      newDetails.age == customerDetails.age &&
      newDetails.phone == customerDetails.phone
    ) {
      setTimeout(() => {
        notification.render("Profile details updated successfully", "success");
      }, 200);

      return;
    }

    const response = await axios.post(
      "/web/includes/controllers/update-profile.controller.php",
      newDetails
    );

    if (!response.data) return;

    setTimeout(() => {
      notification.render(
        response.data.message,
        response.data.success ? "success" : "error"
      );
    }, 200);
  }
});
