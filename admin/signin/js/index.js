import { validateFields } from "../../../includes/js/scripts/authentication.js";

const username    = document.getElementById("username");
const password = document.getElementById("password");
const submit = document.getElementById("admin-submit");

const fields = {
  username,
  password
}

validateFields(fields);

submit.addEventListener("click", () => {
  const adminError = document.getElementById("admin-error");
  adminError.remove();
})