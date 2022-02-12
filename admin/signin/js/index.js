import { validateFieldsWithInput } from "../../../includes/js/scripts/form.js";

const username    = document.getElementById("username");
const password = document.getElementById("password");
const submit = document.getElementById("admin-submit");

const fields = {
  username,
  password
}

validateFieldsWithInput(fields);

submit.addEventListener("click", () => {
  const adminError = document.getElementById("admin-error");
  adminError.remove();
})