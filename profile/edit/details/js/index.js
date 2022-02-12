const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

if (params.active === "details") {
  document.querySelector("#edit-details").className = "text-blue-700 bg-gray-100 inline-flex relative items-center py-2 px-4 w-full text-sm font-medium rounded-t-lg border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700"
}

// Fields
const firstName = document.getElementById("first-name");
const lastName = document.getElementById("last-name");
const age = document.getElementById("age");
const phone = document.getElementById("phone");

// Sidebar buttons
const profileButton = document.getElementById("profile-button");
const changePasswordButton = document.getElementById("change-password");

window.onload = async () => {
  const api = "/web/includes/controllers/get-profile.controller.php";
  const response = await axios.get(api);
  const { success, user } = response.data;

  if (success) {
    firstName.value = user.firstName;
    lastName.value = user.lastName;
    age.value = user.age;
    phone.value = user.phone;
  }
}