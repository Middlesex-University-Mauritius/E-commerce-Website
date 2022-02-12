import { validateFieldsWithInput, validateFieldsWithoutInput } from "../../../../includes/js/scripts/form.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

if (params.active === "details") {
  document.querySelector("#edit-details").className = "text-blue-700 bg-gray-100 inline-flex relative items-center py-2 px-4 w-full text-sm font-medium rounded-t-lg border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700"
}

// Profile name
const profileName = document.getElementById("profile-name");

// Fields
const firstName = document.getElementById("first-name");
const lastName = document.getElementById("last-name");
const age = document.getElementById("age");
const phone = document.getElementById("phone");

const fields = {
  firstName,
  lastName,
  age,
  phone
}

// Validate the fields on input
validateFieldsWithInput(fields);

window.onload = async () => {
  const api = "/web/includes/controllers/get-profile.controller.php";
  const response = await axios.get(api);
  const { success, user } = response.data;

  profileName.innerText = `${user.firstName} ${user.lastName}`;

  if (success) {
    firstName.value = user.firstName;
    lastName.value = user.lastName;
    age.value = user.age;
    phone.value = user.phone;
  }
}

// Update profile button
const updateProfileButton = document.getElementById("update-profile-button");

updateProfileButton.addEventListener("click", async () => {
  const { hasErrors } = validateFieldsWithoutInput(fields);

  // No errors
  if (!hasErrors) {
  }
})